<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
            @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href='{{ URL::to('company') }}'><button type="button">Companies</button></a>
                    <br><br>
                    <a href='{{ URL::to('employee') }}'><button type="button">Employees</button></a>
                    
                    @if(Auth::User()->hasRole('admin'))
                        <br><br>
                    <a href='{{ URL::to('permission') }}'><button type="button">Permissions</button></a>
                    <br><br>
                    <a href='{{ URL::to('role') }}'><button type="button">Roles</button></a>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
