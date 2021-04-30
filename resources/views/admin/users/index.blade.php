<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-flow-row auto-rows-max gap-6 p-6 bg-white border-b border-gray-200">

                    @if(session('status'))
                        <div>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <table class="table-auto border border-collapse w-full">
                            <thead>
                                <tr>
                                    <th class="bg-gray-200">Name</th>
                                    <th class="bg-gray-200">Email</th>
                                    <th class="bg-gray-200">Roles</th>
                                    <th class="bg-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $user)
                                    <tr class="{{ $loop->even? 'bg-gray-100' : '' }}">
                                        <td class="border p-2">{{ $user->name }}</td>
                                        <td class="border p-2">{{ $user->email }}</td>
                                        <td class="border p-2">{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                                        <td class="border p-2">
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="text-indigo-400 hover:text-indigo-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $model->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
