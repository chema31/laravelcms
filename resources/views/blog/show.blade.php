<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <article>
                        <h2>{{ $post->title }}</h2>
                        <p>Published by {{ $post->user->name }} on {{ $post->published_at }}</p>
                        <p>
                            {!! $post->body  !!}
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
