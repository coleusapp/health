<?php

use App\Models\SwimmingType;
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
        Schema::create('swimming_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->unsignedInteger('duration')->nullable();
            $table->unsignedInteger('distance')->nullable();
            $table->text('notes')->nullable();
            $table->foreignIdFor(SwimmingType::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
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
        Schema::dropIfExists('swimming_logs');
    }
};
