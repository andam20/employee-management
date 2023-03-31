<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('index') }}
        </h2>
    </x-slot>

    <a href="{{ route('manager-line.create') }}" class="m-2 btn btn-rounded btn-success waves-effect waves-light"><i
            class="bx bx-plus font-size-16 me-2  align-middle"></i>Add Manager Line</a>

    <a href="{{ route('managerLineExport') }}"> <button class="btn btn-secondary buttons-excel buttons-html5"
            tabindex="0" aria-controls="example1" type="button"><span>Export</span></button></a>

    <table class="table mt-2">
        <thead class="thead-light">
            <tr class="bg-secondary">
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Salary</th>
                <th scope="col">Hired date</th>
                <th scope="col">created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($manager_lines as $manager_line)
                <tr>
                    <td scope="row">
                        {{ $loop->iteration }}
                    </td>
                    <td scope="row">
                        {{ $manager_line->name }}
                    </td>

                    <td scope="row">
                        {{ $manager_line->age }}
                    </td>

                    <td scope="row">
                        {{ $manager_line->salary }}
                    </td>

                    <td scope="row">
                        {{ $manager_line->hired_date }}
                    </td>

                    <td scope="row">
                        {{ $manager_line->created_at }}
                    </td>

                    <td scope="row">
                        <a href="{{ route('manager-line.edit', $manager_line->id) }}"
                            class="m-2 btn btn-rounded btn-primary waves-effect waves-light">Edit</a>

                        <a href="{{ route('manager-line.show', $manager_line->id) }}"
                            class="m-2 btn btn-rounded btn-success waves-effect waves-light">show</a>

                        {{-- <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @empty
                <td scopt="row">
                    {{ 'There Is No manager Lines' }}
                </td>
            @endforelse
        </tbody>
    </table>

</x-app-layout>
