<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteProduct extends Model
{
    protected $fillable = [
        'website_sample_id',
        'name',
        'slug',
        'category',
        'description',
        'price',
        'image_path',
        'stock_quantity',
        'is_available',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    public function websiteSample()
    {
        return $this->belongsTo(WebsiteSample::class);
    }
}
