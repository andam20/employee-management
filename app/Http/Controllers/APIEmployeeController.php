<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\DB;
use League\Csv\CannotInsertRecord;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Maatwebsite\Excel\Writer as ExcelWriter;
// use League\Csv\Writer as CsvWriter; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        return Employee::select('name', 'age', 'salary', 'gender', 'hired_date', 'job_title')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, $id)
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



    public function export()
    {
        $employees = Employee::all();
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=employees.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('name', 'age', 'salary', 'gender','hired date', 'job title', 'managers');

        $callback = function () use ($employees, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($employees as $employee) {
                $row['name'] = $employee->name;
                $row['age'] = $employee->age;
                $row['salary'] = $employee->salary;
                $row['gender'] = $employee->gender;
                $row['hired_date'] = $employee->hired_date;
                $row['job_title'] = $employee->job_title;
                $row['managers'] = $employee->managers;

                fputcsv($file, array($row['name'], $row['age'], $row['salary'], $row['gender'], $row['hired_date'], $row['job_title'], $row['managers']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }



    //additional method
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