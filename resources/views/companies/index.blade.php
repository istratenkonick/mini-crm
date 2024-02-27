<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 text-right">
                <x-nav-link :href="route('companies.create')" :active="request()->routeIs('companies.create')">
                    {{ __('Add New Company') }}
                </x-nav-link>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($companies->count() > 0)
                        <ul class="space-y-4">
                            @foreach ($companies as $company)
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            @if($company->logo)
                                                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} logo"
                                                     class="w-16 h-16 object-cover rounded-full">
                                            @else
                                                <span
                                                    class="inline-block w-16 h-16 bg-gray-200 text-gray-500 rounded-full overflow-hidden">
                                                    {{ __('No logo') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route('companies.show', $company->id) }}"
                                               class="text-lg font-medium text-gray-900 hover:underline">{{ $company->name }}</a>
                                            <div class="text-gray-500">{{ $company->email }}</div>
                                            <a href="{{ $company->website }}" class="text-blue-500 hover:underline"
                                               target="_blank">{{ $company->website }}</a>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                           class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>

                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure you want to delete this?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            {{ $companies->links() }}
                        </div>
                    @else
                        <div>{{ __('No companies found.') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
