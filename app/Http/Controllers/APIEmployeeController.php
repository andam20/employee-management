<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class APIEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Employee::all();
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $request->validated();
        return Employee::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request,$id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return $employee;
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Employee::destroy($id);
    }
    

    public function search(Request $request)
{
    $query = $request->input('q');
    $results = Employee::where(function ($q) use ($query) {
        $q->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('managers', 'LIKE', '%' . $query . '%');
        // add more columns here as needed
    })
        ->get();

    return response()->json($results);
}
}