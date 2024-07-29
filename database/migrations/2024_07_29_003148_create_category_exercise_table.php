<?php

use App\Models\Category;
use App\Models\Exercise;
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
        Schema::create('category_exercise', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Exercise::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_exercise');
    }
};
