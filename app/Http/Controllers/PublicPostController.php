<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
class PublicPostController extends Controller
{
    public function latestPosts()
    {
        // Retrieve the latest 4 posts with status = 1
        $posts = Post::with('category')
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();
    
        // Retrieve all categories with their posts (only active posts)
        $categories = Category::with(['posts' => function ($query) {
            $query->where('status', 1)->latest();
        }])->get();
    
        return view('welcome', compact('posts', 'categories'));
    }
    
    public function details(Post $post)
    {
        return view('posts.details', compact('post'));
    }
 
}

