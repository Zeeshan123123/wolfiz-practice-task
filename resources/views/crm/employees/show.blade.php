<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Display an employee info') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">ID: </span> {{ $employee->id }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">First Name: </span> {{ $employee->first_name }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Last Name: </span> {{ $employee->last_name }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Email: </span> {{ $employee->email }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Phone: </span> {{ $employee->phone }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Company: </span> {{ $employee->company->name }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Created At: </span> {{ $employee->created_at->diffForHumans() }}</div>
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Status: </span> {{ ( $employee->status ) ? ucfirst($employee->status):'' }}</div>
                <div class="text-gray-100 px-4 py-4">
                    <a href="{{ route('employees.index') }}" class="bg-indigo-50 inline-flex items-center ml-4 px-2 py-2 rounded text-red-600">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
