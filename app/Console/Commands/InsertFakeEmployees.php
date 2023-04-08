<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;

class InsertFakeEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employees:fake';
    protected $description = 'Insert 1000 rows of fake data into employees table';

    public function handle()
    {
        Employee::factory()->count(1000)->create();
        $this->info('1000 fake employees created');
    }
}
