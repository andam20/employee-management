<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport as ExportsEmployeeExport;
use App\Exports\FounderExport;
use App\Http\Requests\EmployeeExport;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\FounderRequest;
use App\Http\Requests\ManagerLineRequest;
use App\Models\Employee;
use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class FounderController extends Controller
{
    public function index(Request $request)
    {

        $founders = Founder::all();

        return view('founder.index', compact('founders'));
    }

    public function create()
    {
        return view('founder.create');
    }

    public function store(FounderRequest $request)
    {
        try {
            $validated = $request->validated();

            $car = Founder::create($validated);

            if ($request->image) {
                $car->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('founder.index')->with([
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

       $founder=  Founder::whereId($id)->get();

        return view('founder.show',compact('founder'));
    }

    public function edit(Founder $founder)
    {
        return view('founder.edit', compact('founder'));
    }


    public function update(FounderRequest $request, Founder $founder)
    {
        try {
            $validated = $request->validated();
            unset($validated['image']);
            $founder->update($validated);

            if ($request->has('image')) {
                $founder->media()->delete();
                // addMediaFromRequest expects the name of the file in the view
                $founder->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }

            return redirect()->route('founder.index')->with([
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
     $founder = Founder::find($id);

     // Delete the employee
     $founder->delete();
        return redirect()->route('founder.index');
    }



    public function exportIntoExcel()
    {

        // get the heading of your file from the table or you can created your own heading
        $table = "founders";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Founder::query();

        // create file name  
        $fileName = "founder_export_" . date('Y-m-d_h:i_a') . ".csv";

        return (new FounderExport($query, $headers))->download($fileName);
    }
}