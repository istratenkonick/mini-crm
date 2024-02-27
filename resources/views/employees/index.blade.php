<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 text-right">
                <x-nav-link :href="route('employees.create')" :active="request()->routeIs('employees.create')">
                    {{ __('Add New Employee') }}
                </x-nav-link>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($employees->count() > 0)
                        <ul class="space-y-4">
                            @foreach ($employees as $employee)
                                <li class="flex items-center justify-between">
                                    <div>
                                        <div class="flex items-center space-x-4">
                                            <div>
                                                <a href="{{ route('employees.show', $employee->id) }}"
                                                   class="text-lg font-medium text-gray-900 hover:underline">{{ $employee->first_name }} {{ $employee->last_name }}</a>
                                                <div class="text-gray-500">{{ $employee->email }}</div>
                                                <div class="text-gray-500">{{ $employee->phone }}</div>
                                                <div class="text-gray-500">{{ $employee->company->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                           class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>

                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
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
                            {{ $employees->links() }}
                        </div>
                    @else
                        <div>{{ __('No employees found.') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
