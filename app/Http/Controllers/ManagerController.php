<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport as ExportsEmployeeExport;
use App\Exports\ManagerExport;
use App\Exports\ManagerLineExport;
use App\Http\Requests\EmployeeExport;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ManagerLineRequest;
use App\Http\Requests\ManagerRequest;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\ManagerLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $managers = Manager::all();
        return view('manager.index', compact('managers'));
    }

    public function create()
    {
        return view('manager.create');
    }

    public function store(ManagerRequest $request)
    {
        try {
            $validated = $request->validated();

            $car = Manager::create($validated);

            if ($request->image) {
                $car->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('manager.index')->with([
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

       $manager=  Manager::whereId($id)->get();

        return view('manager.show',compact('manager'));
    }

    public function edit(Manager $manager)
    {
        return view('manager.edit', compact('manager'));
    }


    public function update(ManagerRequest $request, Manager $manager)
    {
        try {
            $validated = $request->validated();
            unset($validated['image']);
            $manager->update($validated);

            if ($request->has('image')) {
                $manager->media()->delete();
                // addMediaFromRequest expects the name of the file in the view
                $manager->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('manager.index')->with([
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
     $manager = Manager::find($id);

     // Delete the employee
     $manager->delete();
        return redirect()->route('manager.index');
    }



    public function exportIntoExcel()
    {

        // get the heading of your file from the table or you can created your own heading
        $table = "managers";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Manager::query();

        // create file name  
        $fileName = "manager_export_" . date('Y-m-d_h:i_a') . ".csv";

        return (new ManagerExport($query, $headers))->download($fileName);
    }
}