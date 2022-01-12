<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company info') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">ID: </span> {{ $company->id }}</div>
                
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Name: </span> {{ $company->name }}</div>

                
                <div class="text-gray-100 px-4 py-4">
                    <span class="font-semibold ml-4">Logo: </span>
                    <img class="flex-1 ml-4" src="{{ getImage($company->logo) }}" width="100"/>
                </div>

                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Email: </span> {{ $company->email }}</div>
                
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Website: </span> {{ $company->website }}</div>

                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Total employees: </span> {{ ( $company->employees ) ? $company->employees->count():'' }}</div>

                @if(count($company->employees))

                    <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Active employees today: </span>
                        @foreach($company->activeEmployeesToday as $employee)
                            {{ $employee->first_name . ' ' . $employee->last_name . (($loop->last) ? ' ' : ',')  }}
                        @endforeach
                    </div>

                    <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Active employees this week: </span>
                        @foreach($company->activeEmployeesThisWeek as $employee)
                            {{ $employee->first_name . ' ' . $employee->last_name . (($loop->last) ? ' ' : ',')  }}
                        @endforeach
                    </div>
                @endif
                
                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Created At: </span> {{ ( $company->created_at ) ? $company->created_at->diffForHumans():'' }}</div>

                <div class="text-gray-100 px-4 py-4"><span class="font-semibold ml-4">Status: </span> {{ ( $company->status ) ? ucfirst($company->status):'' }}</div>

                <div class="text-gray-100 px-4 py-4">
                    <a href="{{ route('companies.index') }}" class="bg-blue-50 inline-flex items-center ml-4 px-2 py-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        <span class="ml-2">
                            Go Back
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

