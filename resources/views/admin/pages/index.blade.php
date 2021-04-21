<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('pages.create') }}">Create new</a>

                    <table class="table-fixed border">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>
                                        <a href="{{ route('pages.edit', ['page' => $page->id]) }}">
                                            {{ $page->title }}
                                        </a>
                                    </td>
                                    <td>{{ $page->url }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
