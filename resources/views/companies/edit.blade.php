<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
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

                    <form method="POST" action="{{ route('companies.update', $company->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>

                            <input id="name" class="block mt-1 w-full" type="text" name="name"
                                   value="{{ old('name', $company->name) }}" required autofocus/>
                        </div>

                        <div class="mt-4">
                            <label for="logo" class="block font-medium text-sm text-gray-700">{{ __('Logo') }}</label>

                            <input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
                        </div>

                        <div class="mt-4">
                            <label for="website"
                                   class="block font-medium text-sm text-gray-700">{{ __('Website') }}</label>

                            <input id="website" class="block mt-1 w-full" type="text" name="website"
                                   value="{{ old('website', $company->website) }}"/>
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
