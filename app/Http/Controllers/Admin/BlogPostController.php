<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::query();

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('author', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('meta_description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Filter by status (published/draft)
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Filter by author
        if ($request->filled('author') && $request->author !== 'all') {
            $query->where('author', $request->author);
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Sorting - UPDATED TO INCLUDE VIEWS
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        // Validate sort parameters - ADDED 'views'
        $allowedSortBy = ['title', 'author', 'category', 'created_at', 'updated_at', 'is_published', 'views'];
        $allowedSortOrder = ['asc', 'desc'];

        if (!in_array($sortBy, $allowedSortBy)) {
            $sortBy = 'created_at';
        }

        if (!in_array($sortOrder, $allowedSortOrder)) {
            $sortOrder = 'desc';
        }

        // Apply sorting
        if ($sortBy === 'is_published') {
            $query->orderBy('is_published', $sortOrder)
                ->orderBy('created_at', 'desc');
        } else {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Pagination
        $perPage = $request->get('per_page', 10);
        $allowedPerPage = [5, 10, 25, 50, 100];

        if (!in_array($perPage, $allowedPerPage)) {
            $perPage = 10;
        }

        $posts = $query->paginate($perPage)->appends($request->all());

        // Get data for filters
        $categories = BlogPost::getCategories();
        $authors = BlogPost::distinct()->pluck('author')->sort()->values();
        $totalPosts = BlogPost::count();
        $publishedPosts = BlogPost::where('is_published', true)->count();
        $draftPosts = BlogPost::where('is_published', false)->count();

        // ADDED ANALYTICS DATA FOR VIEWS
        $totalViews = BlogPost::sum('views') ?? 0;
        $averageViews = BlogPost::where('views', '>', 0)->avg('views') ?? 0;
        $mostViewedPost = BlogPost::orderBy('views', 'desc')->first();

        return view('admin.blog-posts.index', compact(
            'posts',
            'categories',
            'authors',
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'totalViews',
            'averageViews',
            'mostViewedPost'
        ));
    }

    public function create()
    {
        $categories = BlogPost::getCategories();
        return view('admin.blog-posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'category' => 'required|in:Training,Breeding,Dog Walking,Health & Wellness',
            'author' => 'required|string|max:255',
            'meta_description' => 'required|string|max:300',
            'is_published' => 'boolean'
        ]);

        // Handle tags
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        // Handle file uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('blog-images', 'public');
                $imagePaths[] = $path;
            }
        }
        $validated['images'] = $imagePaths;

        // INITIALIZE VIEWS TO 0 FOR NEW POSTS
        $validated['views'] = 0;

        // Set published_at if publishing
        if ($validated['is_published'] ?? false) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post created successfully!');
    }

    public function show(BlogPost $blogPost)
    {
        return view('admin.blog-posts.show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = BlogPost::getCategories();
        return view('admin.blog-posts.edit', compact('blogPost', 'categories'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'category' => 'required|in:Training,Breeding,Dog Walking,Health & Wellness',
            'author' => 'required|string|max:255',
            'meta_description' => 'required|string|max:300',
            'is_published' => 'boolean'
        ]);

        // Handle tags
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        // Handle file uploads
        $imagePaths = $blogPost->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('blog-images', 'public');
                $imagePaths[] = $path;
            }
        }
        $validated['images'] = $imagePaths;

        // Set published_at if publishing for first time
        if (($validated['is_published'] ?? false) && !$blogPost->published_at) {
            $validated['published_at'] = now();
        }

        // DON'T RESET VIEWS ON UPDATE - preserve existing view count
        $blogPost->update($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blogPost)
    {
        // Delete associated images
        if ($blogPost->images) {
            foreach ($blogPost->images as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully!');
    }

    // Bulk actions method
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,publish,unpublish',
            'selected_posts' => 'required|array|min:1',
            'selected_posts.*' => 'exists:blog_posts,id'
        ]);

        $postIds = $request->selected_posts;
        $action = $request->action;

        switch ($action) {
            case 'delete':
                $posts = BlogPost::whereIn('id', $postIds)->get();
                foreach ($posts as $post) {
                    // Delete associated images
                    if ($post->images) {
                        foreach ($post->images as $imagePath) {
                            Storage::disk('public')->delete($imagePath);
                        }
                    }
                    $post->delete();
                }
                $message = count($postIds) . ' post(s) deleted successfully!';
                break;

            case 'publish':
                BlogPost::whereIn('id', $postIds)
                    ->where('is_published', false)
                    ->update([
                        'is_published' => true,
                        'published_at' => now()
                    ]);
                $message = count($postIds) . ' post(s) published successfully!';
                break;

            case 'unpublish':
                BlogPost::whereIn('id', $postIds)
                    ->where('is_published', true)
                    ->update(['is_published' => false]);
                $message = count($postIds) . ' post(s) unpublished successfully!';
                break;
        }

        return redirect()->route('admin.blog-posts.index')
            ->with('success', $message);
    }

    // ADDITIONAL METHOD: Reset views for a specific post (optional)
    public function resetViews(BlogPost $blogPost)
    {
        $blogPost->update(['views' => 0]);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Views reset successfully for "' . $blogPost->title . '"');
    }

    // ADDITIONAL METHOD: Get analytics data via AJAX (optional)
    public function analytics(Request $request)
    {
        $period = $request->get('period', 30); // days

        $analytics = [
            'total_views' => BlogPost::sum('views'),
            'published_posts' => BlogPost::where('is_published', true)->count(),
            'draft_posts' => BlogPost::where('is_published', false)->count(),
            'average_views' => round(BlogPost::where('views', '>', 0)->avg('views') ?? 0, 2),
            'most_viewed' => BlogPost::orderBy('views', 'desc')->limit(5)->get(['title', 'views', 'slug']),
            'recent_posts' => BlogPost::where('created_at', '>=', now()->subDays($period))
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get(['title', 'views', 'created_at', 'slug']),
            'category_stats' => BlogPost::selectRaw('category, COUNT(*) as count, SUM(views) as total_views')
                ->groupBy('category')
                ->get()
        ];

        return response()->json($analytics);
    }
}
