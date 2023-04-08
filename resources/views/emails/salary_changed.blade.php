@component('mail::message')
# Salary Changed

Hello {{ $employeeName }},

Your salary has been changed to ${{ $newSalary }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
