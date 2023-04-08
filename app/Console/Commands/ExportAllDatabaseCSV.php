<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportAllDatabaseCSV extends Command
{
    protected $signature = 'export:alldb:csv';
    protected $description = 'Export the entire database to a CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $directory = storage_path('app/backup');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $tables = DB::select('SHOW TABLES');
        $tables = array_column($tables, 'Tables_in_' . env('DB_DATABASE'));

        $filename = 'backup_' . date('YmdHis') . '.csv';
        $output = fopen(storage_path('app/backup/' . $filename), 'w');

        foreach ($tables as $tableName) {
            fputcsv($output, [$tableName]);
            $columns = DB::select('SHOW COLUMNS FROM ' . $tableName);
            $columnNames = [];
            foreach ($columns as $column) {
                $column = get_object_vars($column);
                $columnNames[] = $column['Field'];
            }
            fputcsv($output, $columnNames);
            $rows = DB::table($tableName)->get()->toArray();
            foreach ($rows as $row) {
                $row = get_object_vars($row);
                fputcsv($output, $row);
            }
            fwrite($output, "\r\n");
        }
        fclose($output);
        $this->info('All databases exported successfully!');
    }
}