<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployeeSalaryUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $salary;

    /**
     * Create a new message instance.
     */

    public function __construct($employee, $salary)
    {
        $this->employee = $employee;
        $this->salary = $salary;
    }

    public function build()
    {
        $subject = 'Your salary has been updated';
        $message = 'Dear ' . $this->employee->name . ', your salary has been updated to ' . $this->salary . '.';

        return $this->subject($subject)
            ->view('emails.employee-salary-update', ['message' => $message]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Employee Salary Update Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}