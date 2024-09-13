<?php

use App\Models\User;
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
        Schema::create('brushing_teeth_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->unsignedInteger('duration')->nullable();
            $table->boolean('flossed')->default(false);
            $table->boolean('fluoride_taken')->default(false);
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brushing_teeth_logs');
    }
};
