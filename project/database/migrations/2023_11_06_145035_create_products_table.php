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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_image');
            $table->bigInteger('price');
            $table->integer('stock')->comment('mojodi');
            $table->integer('age_range')->comment('renge seni');
            $table->tinyInteger('gender')->comment('0 => dokhtar .. 1 => pesar .. 2 => both');
            $table->tinyInteger('stock_status')->comment('0 => nist .. 1 => hast');
            $table->foreignId('category_id')->constrained('product_categories')->onUpdate('cascade')->onDelete('cascade ');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade ');
            $table->foreignId('brand_id')->constrained('product_brands')->onUpdate('cascade')->onDelete('cascade ')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
