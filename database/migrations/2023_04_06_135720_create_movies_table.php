<?php

use App\Models\Director;
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
            /**
            | id  | name               | year | genre  |
            | --- | ------------------ | ---- | ------ |
            | 1   | Mission Impossible | 2004 | Action |
            | 2   | Top Gun            | 1986 | Action |
            */
        Schema::create(
            'movies', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('name', 200);
                $table->string('image_url', 1000);
                $table->foreignIdFor(Director::class);
                $table->date('released_at');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
