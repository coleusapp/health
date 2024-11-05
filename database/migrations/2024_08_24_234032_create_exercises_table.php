<?php

use App\Models\Category;
use App\Models\MuscleGroup;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('has_reps')->default(true);
            $table->boolean('has_weight')->default(true);
            $table->string('weight_unit')->nullable();
            $table->boolean('has_distance')->default(true);
            $table->string('distance_unit')->nullable();
            $table->boolean('has_duration')->default(true);
            $table->string('duration_unit')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
