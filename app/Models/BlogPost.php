<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'images',
        'tags',
        'category',
        'author',
        'meta_description',
        'views',
        'is_published',
        'published_at'
    ];

    protected $casts = [
        'images' => 'array',
        'tags' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer'
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title') && empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
    /**
     * Get formatted view count for display
     */
    public function getFormattedViewsAttribute()
    {
        if ($this->views >= 1000000) {
            return round($this->views / 1000000, 1) . 'M';
        }
        if ($this->views >= 1000) {
            return round($this->views / 1000, 1) . 'K';
        }
        return number_format($this->views);
    }

    /**
     * Scope for popular posts (most viewed)
     */
    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc');
    }

    /**
     * Check if post is trending (high views recently)
     */
    public function getIsTrendingAttribute()
    {
        $recentViews = static::where('published_at', '>=', now()->subDays(7))
            ->avg('views') ?? 0;

        return $this->views > ($recentViews * 1.5);
    }
    // Scope for published posts
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Get categories for dropdown
    public static function getCategories()
    {
        return ['Training', 'Breeding', 'Dog Walking', 'Health & Wellness'];
    }

    // Add these methods to your BlogPost model (app/Models/BlogPost.php)


    /**
     * Get the route key for the model (use slug instead of id)
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get reading time estimate
     */
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->description));
        $minutes = ceil($wordCount / 200); // Average reading speed
        return $minutes;
    }

    /**
     * Get excerpt from description
     */
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->description), 150);
    }

    /**
     * Get featured image
     */
    public function getFeaturedImageAttribute()
    {
        if ($this->images && count($this->images) > 0) {
            return asset('storage/' . $this->images[0]);
        }
        return null;
    }

    /**
     * Check if post has multiple images
     */
    public function hasGallery()
    {
        return $this->images && count($this->images) > 1;
    }
}
