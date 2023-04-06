<?php

use App\Models\Actor;
use App\Models\Movie;
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
        Schema::create('castings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Actor::class);
            $table->foreignIdFor(Movie::class);
            $table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('castings');
    }
};
