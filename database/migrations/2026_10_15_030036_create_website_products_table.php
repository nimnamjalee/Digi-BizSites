<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
public function up(): void
{
    Schema::create('website_products', function (Blueprint $table) {
        $table->id();

        $table->foreignId('website_sample_id')
            ->constrained('website_samples')
            ->cascadeOnDelete();

        $table->string('name');
        $table->string('slug');
        $table->string('category')->nullable();
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2)->default(0);
        $table->string('image_path')->nullable();
        $table->unsignedInteger('stock_quantity')->default(0);
        $table->boolean('is_available')->default(true);

        $table->timestamps();

        $table->unique(['website_sample_id', 'slug']);
    });
}

public function down(): void
{
    Schema::dropIfExists('website_products');
}

};
