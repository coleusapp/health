<?php

use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\Workout;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('health.table_prefix').'exercise_workout', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Workout::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Exercise::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedSmallInteger('reps')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->unsignedInteger('distance')->nullable();
            $table->string('distance_unit')->nullable();
            $table->unsignedSmallInteger('duration')->nullable();
            $table->string('duration_unit')->nullable();
            $table->unsignedSmallInteger('calorie')->nullable();
            $table->string('calorie_unit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('health.table_prefix').'exercise_workout');
    }
};
