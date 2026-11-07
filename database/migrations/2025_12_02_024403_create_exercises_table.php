<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('health.table_prefix').'exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('has_rep')->default(true);
            $table->boolean('has_weight')->default(true);
            $table->string('weight_unit')->nullable();
            $table->boolean('has_distance')->default(true);
            $table->string('distance_unit')->nullable();
            $table->boolean('has_calorie')->default(true);
            $table->string('calorie_unit')->nullable();
            $table->boolean('has_duration')->default(true);
            $table->string('duration_unit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('health.table_prefix').'exercises');
    }
};
