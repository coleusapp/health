<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(config('health.table_prefix').'oral_cares', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->unsignedInteger('duration')->nullable();
            $table->boolean('brushed')->default(false);
            $table->boolean('flossed')->default(false);
            $table->boolean('fluoride_taken')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('health.table_prefix').'oral_cares');
    }
};
