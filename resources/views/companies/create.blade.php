<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('name') }}">
                            @error('name')
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
                            <label for="logo" class="block text-sm font-medium text-gray-700">{{ __('Logo') }}</label>
                            <input type="file" name="logo" id="logo"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('logo')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="website"
                                   class="block text-sm font-medium text-gray-700">{{ __('Website') }}</label>
                            <input type="url" name="website" id="website"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('website') }}">
                            @error('website')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="bg-indigo-50 hover:bg-red-700 text-gray-900 font-bold py-2 px-4 rounded">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
