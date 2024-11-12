<!-- resources/views/admin/posts/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold">{{ $post->title }}</h3>
                <p class="mt-2 text-gray-600"><strong>Category:</strong> {{ $post->category->name }}</p>
                <p class="mt-2 text-gray-600"><strong>Description:</strong> {{ $post->description }}</p>
                
                @if($post->image)
                    <p class="mt-4"><strong>Image:</strong></p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-2 w-64 h-64 object-cover">
                @endif

                <p class="mt-4"><strong>Status:</strong> {{ $post->status ? 'Active' : 'Inactive' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
