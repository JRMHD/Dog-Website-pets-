<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\BlogController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/packages', function () {
    return view('packages');
})->name('packages');

Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// Route::get('/blogs', function () {
//     return view('blog');
// })->name('blog');

// Profile routes (auth protected)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Auth routes
require __DIR__ . '/auth.php';


Route::post('/consultation/store', [ConsultationController::class, 'store'])->name('consultation.store');
Route::get('/consultation/quiz-question', [ConsultationController::class, 'getQuizQuestion'])->name('consultation.quiz');
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');


Route::middleware(['auth', 'verified', 'check.frozen', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // User Management Routes
    Route::resource('users', UserController::class);

    // Additional user actions
    Route::patch('users/{user}/freeze', [UserController::class, 'freeze'])->name('users.freeze');
    Route::patch('users/{user}/unfreeze', [UserController::class, 'unfreeze'])->name('users.unfreeze');

    // Blog Posts Management
    Route::resource('blog-posts', BlogPostController::class);

    Route::post('blog-posts/bulk-action', [BlogPostController::class, 'bulkAction'])->name('blog-posts.bulk-action');
});


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/', function () {
    $latestPosts = App\Models\BlogPost::published()
        ->orderBy('published_at', 'desc')
        ->limit(6)
        ->get();

    return view('welcome', compact('latestPosts'));
});
