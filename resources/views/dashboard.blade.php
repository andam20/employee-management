<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <p class="" style="color: red">
                        {{ __("1- first you have to have a founder if not you can't have a manager and also you have to have a manager to have a manager line and also you have to have manger line and then you can have an employee
                                                                ") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
