<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::published();

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('meta_description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Sort options
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default: // latest
                $query->orderBy('published_at', 'desc');
                break;
        }

        $posts = $query->paginate(12)->appends($request->all());
        $categories = BlogPost::getCategories();

        // Get featured posts only if not filtering
        $featuredPosts = collect();
        if (!$request->hasAny(['search', 'category', 'sort'])) {
            $featuredPosts = BlogPost::published()
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
        }

        return view('blog', compact('posts', 'categories', 'featuredPosts'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $post->increment('views');

        // Get related posts from same category
        $relatedPosts = BlogPost::published()
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Get recent posts
        $recentPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        return view('blogdetails', compact('post', 'relatedPosts', 'recentPosts'));
    }

    public function category($category)
    {
        $posts = BlogPost::published()
            ->where('category', $category)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $categories = BlogPost::getCategories();


        $featuredPosts = collect();


        return view('blog', compact('posts', 'categories', 'featuredPosts'))
            ->with('selectedCategory', $category);
    }
}
