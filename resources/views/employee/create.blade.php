<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create employee') }}
        </h2>
    </x-slot>


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
                    <form class="needs-validation" novalidate action="{{ route('employee.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="age" class="col-sm-3 col-form-label">age</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="age" name="age"
                                            value="{{ old('age') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label" for="gender">gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="gender" name="gender" required>
                                            <option value="male" @selected(old('gender') == 'male')>male</option>
                                            <option value="female" @selected(old('gender') == 'female')>female</option>
                                        </select>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="salary" class="col-sm-3 col-form-label">salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salary" name="salary"
                                            value="{{ old('salary') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="hired_date" class="col-sm-3 col-form-label">hired_date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="hired_date" name="hired_date"
                                            value="{{ old('hired_date') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="job_title" class="col-sm-3 col-form-label">job_title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="job_title" name="job_title"
                                            value="{{ old('job_title') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="managers" class="col-sm-3 col-form-label">managers</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="managers" name="managers"
                                            value="{{ old('managers') }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary" type="submit">{{ 'submit' }}</button>
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
