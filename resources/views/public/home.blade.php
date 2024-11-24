@extends('layouts.public')
@section('content')

<!-- Hero Section -->
<!-- Hero Section with Modern Design -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-500 to-blue-200">
    <div class="absolute inset-0">
        <img src="./assets/images/hero.jpg" alt="Education Background"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/70 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center text-white">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 animate-fade-in-up">
            Welcome to <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-green-300 via-blue-500 to-purple-600">BACBON
                Tutors Blog</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 animate-fade-in-up delay-200">
            Discover educational insights, student success stories, and expert teaching resources.
        </p>
        <div
            class="flex flex-col sm:flex-row gap-4 justify-center items-center opacity-0 animate-[fade-in-up_1s_ease-out_0.6s_forwards]">
            <a href="#featured"
                class="px-8 py-4 bg-white text-blue-600 rounded-full text-lg font-semibold hover:bg-blue-50 transform hover:-translate-y-1 transition-all duration-200 shadow-lg hover:shadow-xl">
                Explore Articles
            </a>
            <a href="#categories"
                class="px-8 py-4 bg-blue-700/70 text-white rounded-full text-lg font-semibold backdrop-blur-sm hover:bg-blue-700/40 transform hover:-translate-y-1 transition-all duration-200 border border-white/20">
                Browse Categories
            </a>
        </div>
    </div>
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce bg-blue-700/30 p-5 rounded-full">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Featured Posts Section -->
@if(isset($posts) && $posts->isNotEmpty())
    <section id="featured" class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 reveal">Featured Articles</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article
                        class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 reveal">
                        <div class="relative overflow-hidden">
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                                alt="{{ $post->title }}"
                                class="w-full h-56 object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </div>

                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name ?? 'Unknown') }}&background=random"
                                    alt="Author" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $post->user->name ?? 'Unknown Author' }}</p>
                                    <p class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</p>
                                </div>
                            </div>

                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $post->title }}
                            </h3>

                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $post->description }}</p>

                            <a href="{{ route('public.posts.details', $post->id) }}"
                                class="inline-flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                                Read Article
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Categories Section -->
@if(isset($categories) && $categories->isNotEmpty())
    <section id="categories" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($categories as $category)
                @if($category->posts->isNotEmpty())
                    <div class="mb-24 last:mb-0 reveal">
                        <div class="flex items-center justify-between mb-12">
                            <h2 class="text-3xl font-bold text-gray-900 relative">
                                {{ $category->name }}
                                <div class="absolute -bottom-2 left-0 w-24 h-1 bg-blue-600 rounded-full"></div>
                            </h2>
                            @if($category->posts->count() > 3)
                                <a href="{{ route('public.categories.posts', $category->id) }}"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors duration-200">
                                    View All
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            @endif
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($category->posts->take(3) as $post)
                                <article
                                    class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 reveal">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->parent->iteration . $loop->iteration }}"
                                            alt="{{ $post->title }}"
                                            class="w-full h-56 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </div>

                                    <div class="p-8">
                                        <div class="flex items-center mb-4">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name ?? 'Unknown') }}&background=random"
                                                alt="Author" class="w-10 h-10 rounded-full mr-3">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $post->user->name ?? 'Unknown Author' }}
                                                </p>
                                                <p class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</p>
                                            </div>
                                        </div>

                                        <h3
                                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                            {{ $post->title }}
                                        </h3>

                                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $post->description }}</p>

                                        <a href="{{ route('public.posts.details', $post->id) }}"
                                            class="inline-flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                                            Read Article
                                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endif

<!-- Newsletter Section -->
<section class="py-16 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-extrabold mb-4">
            Stay Updated with <span class="text-yellow-300">BACBON Tutors</span>
        </h2>
        <p class="text-blue-100 mb-8">Get the latest educational insights and updates delivered to your inbox.</p>
        <form class="flex flex-col sm:flex-row gap-4 justify-center">
            <input type="email" placeholder="Enter your email"
                class="w-full sm:w-auto px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-yellow-300 text-gray-800"
                required>
            <button type="submit"
                class="px-8 py-3 bg-yellow-400 text-gray-800 rounded-full font-semibold hover:bg-yellow-300 transition-colors duration-300">
                Subscribe
            </button>
        </form>
    </div>
</section>

@endsection