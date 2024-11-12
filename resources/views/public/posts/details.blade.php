@extends('layouts.public')

@section('content')
    <div class="py-16 bg-gray-100 dark:bg-gray-900 ">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-72 object-cover rounded-t-lg">
                @endif
                <div class="p-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Category:</span> {{ $post->category->name }}
                    </p>
                    <p class="mt-4 text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                        {{ $post->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
