<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('posts.update', ['post' => $model->id]) }}" method="post">
                        @method('PUT')
                        @include('admin.posts.partials.form')
                    </form>

                    <form action="{{ route('posts.destroy', ['post' => $model->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" />
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('admin.posts.partials.scripts')

</x-app-layout>