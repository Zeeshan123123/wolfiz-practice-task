<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a employee') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div>
                        <x-label for="first_name" :value="__('First Name')"/>
                        <x-input id="first_name" type="text" class="block mt-1 w-full" name="first_name" :value="old('first_name')" required autofocus/>
                        @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label for="last_name" :value="__('Last Name')"/>
                        <x-input id="last_name" type="text" class="block mt-1 w-full" name="last_name" :value="old('last_name')" required autofocus/>
                        @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label for="company" :value="__('Company')"/>
                        <select name="company" id="company"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value=" ">Select company</option>
                            @if(count($companies))
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ ucwords($company->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')"/>
                        <x-input id="email" type="email" class="block mt-1 w-full" name="email" :value="old('email')" required autofocus/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label for="phone" :value="__('Phone')"/>
                        <x-input id="phone" type="tel" class="block mt-1 w-full" name="phone" :value="old('phone')" autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-label for="status" :value="__('Status')"/>
                        
                        <select name="status" type="text" autofocus id="status" value="{{ old('status') }}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" />
                            <option value="active" {{ "active" == old('status') ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ "inactive" == old('status') ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <x-button>{{ __('Save') }}</x-button>
                        <a href="{{ route('employees.index') }}" class="bg-indigo-50 inline-flex items-center ml-4 px-2 py-2 rounded text-red-600">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

