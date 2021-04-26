<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach( $posts as $post)
                        <article>
                            <h2>
                                <a href="{{ route('blog.show', ['slug'=> $post->slug]) }}">{{ $post->title }}</a>
                            </h2>
                            <p>
                                {{ $post->excerpt }}
                            </p>
                        </article>
                    @endforeach

                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
