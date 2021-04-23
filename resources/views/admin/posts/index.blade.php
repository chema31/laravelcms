<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('status'))
                        <div>
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('posts.create') }}">Create new</a>

                    <table class="table-fixed border">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Slug</th>
                                <th>Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">{{ $posts->links() }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
