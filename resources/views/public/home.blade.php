@extends('layouts.public')
@section('content')
<!-- Hero Section with enhanced animations -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-50/50 to-white">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[url('https://picsum.photos/1920/1080?education')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-blue-900/30 backdrop-blur-sm"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="text-center space-y-8">
            <h1
                class="text-4xl md:text-6xl font-bold text-white mb-6 opacity-0 animate-[fade-in-up_1s_ease-out_0.2s_forwards]">
                Welcome to BACBON School Blog
            </h1>
            <p
                class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto mb-8 opacity-0 animate-[fade-in-up_1s_ease-out_0.4s_forwards]">
                Discover educational insights, student success stories, and expert teaching resources.
            </p>
            <a href="#featured" class="inline-block px-8 py-4 bg-white text-blue-600 rounded-lg text-lg font-semibold 
                          hover:bg-blue-50 transform hover:-translate-y-1 transition-all duration-200 
                          opacity-0 animate-[fade-in-up_1s_ease-out_0.6s_forwards]">
                Explore Our Blog
            </a>
        </div>
    </div>
</section>

<!-- Featured Posts with reveal animation -->
@if(isset($posts) && $posts->isNotEmpty())
    <section id="featured" class="py-16 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 reveal">Featured Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article
                        class="bg-white  shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300 reveal">
                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                            alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                            <a href="{{ route('public.posts.details', $post->id) }}"
                                class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Categories with Posts with reveal animation -->
@if(isset($categories) && $categories->isNotEmpty())
    <section id="categories" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($categories as $category)
                <div class="mb-16 last:mb-0 reveal">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-b-2 py-2">{{ $category->name }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($category->posts->take(3) as $post)
                            <article
                                class="bg-white  shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300 reveal">
                                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->parent->iteration . $loop->iteration }}"
                                    alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                                    <a href="{{ route('public.posts.details', $post->id) }}"
                                        class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                                        Read More
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    @if($category->posts->count() > 3)
                        <div class="mt-8 text-center">
                            <a href="{{ route('public.categories.posts', $category->id) }}"
                                class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-blue-700 transition duration-300">
                                See More
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif


<!-- Newsletter -->
<section class="py-16 bg-blue-600 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Stay Updated with BACBON School</h2>
        <p class="text-blue-100 mb-8">Get the latest educational insights and updates delivered to your inbox.</p>
        <form class="flex flex-col sm:flex-row gap-4 justify-center">
            <input type="email" placeholder="Enter your email"
                class="px-6 py-3 rounded-lg flex-1 max-w-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
            <button type="submit"
                class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-colors duration-200">
                Subscribe
            </button>
        </form>
    </div>
</section>



@endsection