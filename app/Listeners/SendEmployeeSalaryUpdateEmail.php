<?php

namespace App\Listeners;

use App\Events\EmployeeSalaryUpdated;
use App\Mail\EmployeeSalaryUpdateEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmployeeSalaryUpdateEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmployeeSalaryUpdated $event)
    {
        $employee = $event->employee;
        $email = $employee->email;
        $salary = $employee->salary;

        Mail::to($email)->send(new EmployeeSalaryUpdateEmail($employee, $salary));
    }
}
