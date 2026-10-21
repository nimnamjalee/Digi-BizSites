<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSample extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'thumbnail',
        'template_key',
        'status',

        // Business details
        'logo_path',
        'location',
        'business_phone',
        'business_email',
        'business_address',

        // Opening hours
        'opening_days',
        'opening_time',
        'closing_time',

        // Website appearance
        'primary_color',
        'homepage_heading',
        'homepage_description',
        'homepage_banner_path',

        // Social media
        'facebook_url',
        'instagram_url',
    ];

    public function products()
    {
        return $this->hasMany(
            WebsiteProduct::class,
            'website_sample_id'
        );
    }
}
