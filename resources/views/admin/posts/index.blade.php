<!-- resources/views/admin/posts/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Search Form -->
                <form method="GET" action="{{ route('posts.index') }}" class="mb-4">
                    <input type="text" name="search" placeholder="Search by title or category" value="{{ $search ?? '' }}"
                           class="border rounded px-4 py-2" />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                    @if($search)
                        <a href="{{ route('posts.index') }}" class="text-red-500 ml-2">Clear</a>
                    @endif
                </form>

                <a href="{{ route('posts.create') }}" class="text-blue-500">Create New Post</a>
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4">{{ $post->title }}</td>
                                <td class="px-6 py-4">{{ $post->category->name }}</td>
                                <td class="px-6 py-4">{{ $post->status ? 'Active' : 'Inactive' }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="text-indigo-600">Edit</a>
                                    <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-600">View</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
