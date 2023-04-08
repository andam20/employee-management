<?php

namespace App\Http\Controllers;

use App\Events\EmployeeSalaryUpdated;
use App\Exports\EmployeeExport as ExportsEmployeeExport;
use App\Http\Requests\EmployeeExport;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\ManagerLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{

    public function updateSalary(Request $request, $employeeId)
    {
        $employee = Employee::find($employeeId);
        $employee->salary = $request->input('salary');
        $employee->save();

        event(new EmployeeSalaryUpdated($employee));

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $employee = Employee::with('managerLine.manager')->get();
        // dd($employee);

        $employees = Employee::all();

        return view('employee.index', compact('employees','employee'));
    }

    public function create()
    {
        $manager_lines = ManagerLine::select('name', 'id')->get();
        return view('employee.create', compact('manager_lines'));
    }

    public function store(EmployeeRequest $request)
    {
        try {
            $validated = $request->validated();

            $car = Employee::create($validated);

            if ($request->image) {
                $car->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('employee.index')->with([
                "message" => __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                "message" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function show(Request $request, $id)
    {
        $employee = Employee::with('managerLine.manager.founder.managers')->find($id);
        $managers = $employee->managerLine->manager->founder->managers;

        $employee = Employee::whereId($id)->get();
        return view('employee.show', compact('employee', 'managers'));
    }

    public function edit(Employee $employee)
    {
        $manager_lines = ManagerLine::select('name', 'id')->get();
        return view('employee.edit', compact('employee', 'manager_lines'));
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $validated = $request->validated();
            unset($validated['image']);
            $employee->update($validated);

            if ($request->has('image')) {
                $employee->media()->delete();
                // addMediaFromRequest expects the name of the file in the view
                $employee->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('employee.index')->with([
                "message" => __('messages.update'),
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                "message" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }


    public function destroy($id)
    {

        // Find the employee by ID
        $employee = Employee::find($id);

        // Delete the employee
        $employee->delete();
        return redirect()->route('employee.index');
    }



    public function exportIntoExcel()
    {

        // get the heading of your file from the table or you can created your own heading
        $table = "employees";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Employee::query();

        // create file name  
        $fileName = "employee_export_" . date('Y-m-d_h:i_a') . ".csv";

        return (new \App\Exports\EmployeeExport($query, $headers))->download($fileName);
    }
}