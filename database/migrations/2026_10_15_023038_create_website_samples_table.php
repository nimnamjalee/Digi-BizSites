<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
public function up(): void
{
    Schema::create('website_samples', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('category');
        $table->text('description')->nullable();
        $table->string('thumbnail')->nullable();
        $table->string('template_key')->default('bakery');
        $table->string('status')->default('draft');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('website_samples');
}

};
