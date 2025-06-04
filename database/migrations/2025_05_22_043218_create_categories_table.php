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
        Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->enum('category', ['expense', 'income'])->default('expense'); // perbaiki nama kolom menjadi lowercase
    $table->timestamps();
    $table->softDeletes();  // kecil s pada softDeletes
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
