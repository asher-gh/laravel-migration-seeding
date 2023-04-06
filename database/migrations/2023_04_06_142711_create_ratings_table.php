<?php

use App\Models\Movie;
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
        Schema::create(
            'ratings', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->foreignIdFor(User::class);
                $table->foreignIdFor(Movie::class);
                $table->enum('like', [1,-1]);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
