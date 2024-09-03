<?php

use App\Models\Exercise;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->unsignedSmallInteger('sets')->default(1);
            $table->unsignedSmallInteger('reps')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('distance')->nullable();
            $table->unsignedSmallInteger('duration')->nullable();
            $table->text('notes')->nullable();
            $table->foreignIdFor(Exercise::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
