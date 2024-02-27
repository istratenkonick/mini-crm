<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">{{ __('First Name') }}</label>
                            <input type="text" name="first_name" id="first_name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" id="last_name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('last_name') }}">
                            @error('last_name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('email') }}">
                            @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                            <input type="text" name="phone" id="phone"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('phone') }}">
                            @error('phone')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-700">{{ __('Company') }}</label>
                            <select name="company_id" id="company_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option disabled value="" {{ is_null(request('company_id')) ? 'selected' : '' }}>
                                    {{ __('Please select a company') }}
                                </option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ (request('company_id') == $company->id) ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="hidden" name="redirect_to" value="{{ url()->previous() }}">

                        <div class="mt-6">
                            <button type="submit"
                                    class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
