<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport as ExportsEmployeeExport;
use App\Http\Requests\EmployeeExport;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{

    public function index_employee(Request $request)
    {

        $emps = Employee::all();
        return response()->json([
            'status' => 200,
            'message' => 'you did it',
            'data' => $emps
        ]);
    }

    public function index(Request $request)
    {

        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
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

        $employee = Employee::whereId($id)->get();

        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
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

        return (new ExportsEmployeeExport($query, $headers))->download($fileName);
    }
}