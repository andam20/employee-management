<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <a href="{{ route('employee.index') }}" class="m-2 btn btn-rounded btn-success waves-effect waves-light"><i
            class="bx bx-plus font-size-16 me-2  align-middle"></i>all Employee</a>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="needs-validation" novalidate action="{{ route('employee.update', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">

                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">{{'name'}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $employee->name }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="manager_line_id" class="col-sm-3 col-form-label">{{ 'manager line' }}</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="manager_line_id" name="manager_line_id" required>
                                            @foreach ($manager_lines as $manager_line)
                                                <option value="{{ $manager_line->id }}"
                                                    {{ $manager_line->id == old('manager_line_id') ? 'selected' : '' }}>
                                                    {{ $manager_line->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">{{'email'}}</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $employee->email }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="age" class="col-sm-3 col-form-label">{{'age'}}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="age" name="age"
                                            value="{{ $employee->age }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="salary" class="col-sm-3 col-form-label">{{'Salary'}}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salary" name="salary"
                                            value="{{ $employee->salary }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="managers" class="col-sm-3 col-form-label">{{'Managers'}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="managers" name="managers"
                                            value="{{ $employee->managers }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="job_title" class="col-sm-3 col-form-label">{{'Job Title'}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="job_title" name="job_title"
                                            value="{{ $employee->job_title }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="job_title" class="col-sm-3 col-form-label">{{'Hired Date'}}</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="hired_date" name="hired_date"
                                            value="{{ $employee->hired_date }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="gender" name="gender" required>
                                            <option value="male" @selected(old('gender', $employee->gender) == 'male')> male
                                            </option>
                                            <option value="female" @selected(old('gender', $employee->gender) == 'female')>Fe male
                                            </option>
                                        </select>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary" type="submit">{{'submit'}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>