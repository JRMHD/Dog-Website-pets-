<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Listing;

class DashboardController extends Controller
{
    public function index()
    {
        // Blog analytics
        $totalPosts = BlogPost::count();
        $publishedPosts = BlogPost::where('is_published', true)->count();
        $draftPosts = BlogPost::where('is_published', false)->count();
        $totalViews = BlogPost::sum('views') ?? 0;
        $averageViews = round(BlogPost::where('views', '>', 0)->avg('views') ?? 0, 2);
        $mostViewedPost = BlogPost::orderBy('views', 'desc')->first();

        // Listing analytics
        $totalListings = Listing::count();
        $activeListings = Listing::where('is_active', true)->count();
        $inactiveListings = Listing::where('is_active', false)->count();
        $dogListings = Listing::where('type', 'dog')->count();
        $productListings = Listing::where('type', 'product')->count();
        $latestListing = Listing::latest()->first();

        return view('dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'totalViews',
            'averageViews',
            'mostViewedPost',
            'totalListings',
            'activeListings',
            'inactiveListings',
            'dogListings',
            'productListings',
            'latestListing'
        ));
    }
}
