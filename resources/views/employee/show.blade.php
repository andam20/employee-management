<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('index') }}
        </h2>
    </x-slot>

    <a href="{{ route('employee.index') }}" class="m-2 btn btn-rounded btn-success waves-effect waves-light"><i
            class="bx bx-plus font-size-16 me-2  align-middle"></i>All Employee</a>




    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col col-lg-6">
                <div class="card" style="border-radius: .5rem;">
                    <div class="row">
                        {{-- <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
        
                                    <img src="{{ $imageUrl }}" alt="{{ URL::asset('/assets/images/place_holder.jpg') }}"
                                        class="img-fluid my-5 rounded float-end" />
                                    <h5 class="text-uppercase">
                                        @foreach ($companies as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </h5>
                                    <p>
                                        @foreach ($companies as $item)
                                            {{ $item->work_type }}
                                        @endforeach
                                    </p>
                                </div> --}}
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">


                                    <div class="col-6">
                                        <h6>name</h6>
                                        <p class="text-muted">
                                            @foreach ($employee as $item)
                                                {{ $item->name }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>age</h6>
                                        <p class="text-muted">
                                            @foreach ($employee as $item)
                                                {{ $item->age }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>salary</h6>
                                        <p class="text-muted">
                                            @foreach ($employee as $item)
                                                {{ $item->salary }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>job title</h6>
                                        <p class="text-muted">
                                            @foreach ($employee as $item)
                                                {{ $item->job_title }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>hired date</h6>
                                        <p class="text-muted">
                                            @foreach ($employee as $item)
                                                {{ $item->hired_date }}
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <h6>managers</h6>
                                        <p class="text-muted">
                                            @foreach ($employee as $item)
                                                {{ $item->managers }}
                                            @endforeach
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






</x-app-layout>
