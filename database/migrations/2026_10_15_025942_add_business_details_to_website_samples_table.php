<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
public function up(): void
{
    Schema::table('website_samples', function (Blueprint $table) {
        $table->string('logo_path')->nullable();
        $table->string('location')->nullable();
        $table->string('business_phone')->nullable();
        $table->string('business_email')->nullable();
        $table->text('business_address')->nullable();

        $table->text('opening_days')->nullable();
        $table->time('opening_time')->nullable();
        $table->time('closing_time')->nullable();

        $table->string('primary_color', 7)->default('#7161e8');

        $table->string('homepage_heading')->nullable();
        $table->text('homepage_description')->nullable();
        $table->string('homepage_banner_path')->nullable();

        $table->string('facebook_url')->nullable();
        $table->string('instagram_url')->nullable();
    });
}

public function down(): void
{
    Schema::table('website_samples', function (Blueprint $table) {
        $table->dropColumn([
            'logo_path',
            'location',
            'business_phone',
            'business_email',
            'business_address',
            'opening_days',
            'opening_time',
            'closing_time',
            'primary_color',
            'homepage_heading',
            'homepage_description',
            'homepage_banner_path',
            'facebook_url',
            'instagram_url',
        ]);
    });
}

};
