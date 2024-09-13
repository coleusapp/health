<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('oral_cares', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->unsignedInteger('duration')->nullable();
            $table->boolean('brushed')->default(false);
            $table->boolean('flossed')->default(false);
            $table->boolean('fluoride_taken')->default(false);
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oral_cares');
    }
};
