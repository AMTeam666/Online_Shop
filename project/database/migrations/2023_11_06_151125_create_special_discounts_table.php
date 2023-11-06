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
        Schema::create('special_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('general_discount_name');
            $table->integer('percent'); 
            $table->tinyInteger('status')->comment('0 => disable .. 1 => enable'); 
            $table->timestamp('started_at')->useCurrent(); 
            $table->timestamp('finished_at')->useCurrent(); 
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_discounts');
    }
};
