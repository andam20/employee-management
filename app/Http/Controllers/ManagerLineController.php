<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport as ExportsEmployeeExport;
use App\Exports\ManagerLineExport;
use App\Http\Requests\EmployeeExport;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ManagerLineRequest;
use App\Models\Employee;
use App\Models\ManagerLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ManagerLineController extends Controller
{
    public function index(Request $request)
    {
        $manager_lines = ManagerLine::all();
        return view('manager-line.index', compact('manager_lines'));
    }

    public function create()
    {
        return view('manager-line.create');
    }

    public function store(ManagerLineRequest $request)
    {
        try {
            $validated = $request->validated();

            $car = ManagerLine::create($validated);

            if ($request->image) {
                $car->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('manager-line.index')->with([
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

        $manager_line = ManagerLine::whereId($id)->get();

        return view('manager-line.show', compact('manager_line'));
    }

    public function edit(ManagerLine $managerLine)
    {
        return view('manager-line.edit', compact('managerLine'));
    }


    public function update(ManagerLineRequest $request, ManagerLine $manager_line)
    {
        try {
            $validated = $request->validated();
            unset($validated['image']);
            $manager_line->update($validated);

            if ($request->has('image')) {
                $manager_line->media()->delete();
                // addMediaFromRequest expects the name of the file in the view
                $manager_line->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('manager-line.index')->with([
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
        $manager_line = ManagerLine::find($id);
        
        // Delete the employee
        $manager_line->delete();
        return redirect()->route('manager-line.index');
    }

    public function exportIntoExcel()
    {

        // get the heading of your file from the table or you can created your own heading
        $table = "manager_lines";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = ManagerLine::query();

        // create file name  
        $fileName = "managerline_export_" . date('Y-m-d_h:i_a') . ".csv";

        return (new ManagerLineExport($query, $headers))->download($fileName);
    }
}