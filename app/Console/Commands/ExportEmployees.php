<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use Illuminate\Support\Facades\File;

class ExportEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employees:export';
    protected $description = 'Export all employees to a JSON file';

    public function handle()
    {
        $employees = Employee::all();
        $json = $employees->toJson(JSON_PRETTY_PRINT);

        $filename = 'employees_' . date('YmdHis') . '.json';
        $path = storage_path('app/exports/' . $filename);
        File::put($path, $json);

        $this->info('All employees exported to ' . $path);
    }
}
