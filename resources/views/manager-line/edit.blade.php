<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <a href="{{ route('manager-line.index') }}" class="m-2 btn btn-rounded btn-success waves-effect waves-light"><i
            class="bx bx-plus font-size-16 me-2  align-middle"></i>all Manager Line</a>

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
                    <form class="needs-validation" novalidate action="{{ route('manager-line.update', $manager_line->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">

                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">{{'name'}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $manager_line->name }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="manager_id" class="col-sm-3 col-form-label">{{ 'manager' }}</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="manager_id" name="manager_id" required>
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}"
                                                    {{ $manager->id == old('manager_id') ? 'selected' : '' }}>
                                                    {{ $manager->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="age" class="col-sm-3 col-form-label">{{'age'}}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="age" name="age"
                                            value="{{ $manager_line->age }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="salary" class="col-sm-3 col-form-label">{{'Salary'}}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salary" name="salary"
                                            value="{{ $manager_line->salary }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="job_title" class="col-sm-3 col-form-label">{{'Hired Date'}}</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="hired_date" name="hired_date"
                                            value="{{ $manager_line->hired_date }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" id="gender" name="gender" required>
                                            <option value="male" @selected(old('gender', $manager_line->gender) == 'male')> male
                                            </option>
                                            <option value="female" @selected(old('gender', $manager_line->gender) == 'female')>Fe male
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