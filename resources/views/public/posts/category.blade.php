@extends('layouts.public')

@section('content')
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">{{ $category->name }} Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="bg-white  shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                         alt="{{ $post->title }}" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                        <a href="{{ route('public.posts.details', $post->id) }}" 
                           class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                            Read More 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
