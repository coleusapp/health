<?php

use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\MuscleGroup;
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
        Schema::create(config('health.table_prefix').'exercise_muscle_group', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Exercise::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignIdFor(MuscleGroup::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('health.table_prefix').'exercise_muscle_group');
    }
};
