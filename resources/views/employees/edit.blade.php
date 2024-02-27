<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="first_name" class="block font-medium text-sm text-gray-700">{{ __('First Name') }}</label>
                            <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required autofocus/>
                        </div>

                        <div class="mt-4">
                            <label for="last_name" class="block font-medium text-sm text-gray-700">{{ __('Last Name') }}</label>
                            <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required/>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $employee->email) }}" required/>
                        </div>

                        <div class="mt-4">
                            <label for="phone" class="block font-medium text-sm text-gray-700">{{ __('Phone') }}</label>
                            <input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ old('phone', $employee->phone) }}"/>
                        </div>

                        <div class="mt-4">
                            <label for="company_id" class="block font-medium text-sm text-gray-700">{{ __('Company') }}</label>
                            <select id="company_id" name="company_id" class="block mt-1 w-full" required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ (old('company_id', $employee->company_id) == $company->id) ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
