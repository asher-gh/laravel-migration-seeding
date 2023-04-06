<?php

use App\Models\Collection;
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
        Schema::create('collection_movie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Collection::class);
            $table->foreignIdFor(Movie::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_movie');
    }
};
