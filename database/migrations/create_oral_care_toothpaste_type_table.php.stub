<?php

use Coleus\Health\Models\OralCare;
use Coleus\Health\Models\Toothpaste;
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
        Schema::create(config('health.table_prefix').'oral_care_toothpaste', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(OralCare::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignIdFor(Toothpaste::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('health.table_prefix').'oral_care_toothpaste');
    }
};
