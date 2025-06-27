<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'slug',
        'description',
        'price',
        'images',
        'location',
        'is_active',
        'user_id',
        // Dog fields
        'breed',
        'age_months',
        'gender',
        'size',
        'color',
        'vaccinated',
        'health_status',
        'microchipped',
        'temperament',
        'available_from',
        // Product fields
        'category',
        'subcategory',
        'brand',
        'suitable_for',
        'stock_quantity',
        'weight_or_size',
        'ingredients',
        'expiry_date'
    ];

    protected $casts = [
        'images' => 'array',
        'vaccinated' => 'boolean',
        'microchipped' => 'boolean',
        'is_active' => 'boolean',
        'available_from' => 'date',
        'expiry_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($listing) {
            if (!$listing->slug) {
                $listing->slug = Str::slug($listing->name);

                // Ensure unique slug
                $count = static::where('slug', 'like', $listing->slug . '%')->count();
                if ($count > 0) {
                    $listing->slug = $listing->slug . '-' . ($count + 1);
                }
            }
        });

        static::updating(function ($listing) {
            if ($listing->isDirty('name')) {
                $listing->slug = Str::slug($listing->name);

                // Ensure unique slug (excluding current record)
                $count = static::where('slug', 'like', $listing->slug . '%')
                    ->where('id', '!=', $listing->id)
                    ->count();
                if ($count > 0) {
                    $listing->slug = $listing->slug . '-' . ($count + 1);
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDogs($query)
    {
        return $query->where('type', 'dog');
    }

    public function scopeProducts($query)
    {
        return $query->where('type', 'product');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function isDog()
    {
        return $this->type === 'dog';
    }

    public function isProduct()
    {
        return $this->type === 'product';
    }

    public function getFirstImageAttribute()
    {
        return $this->images && count($this->images) > 0 ? $this->images[0] : null;
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    public function getAgeDisplayAttribute()
    {
        if (!$this->age_months) return null;

        if ($this->age_months < 12) {
            return $this->age_months . ' month' . ($this->age_months > 1 ? 's' : '');
        }

        $years = floor($this->age_months / 12);
        $months = $this->age_months % 12;

        $display = $years . ' year' . ($years > 1 ? 's' : '');
        if ($months > 0) {
            $display .= ' ' . $months . ' month' . ($months > 1 ? 's' : '');
        }

        return $display;
    }
}
