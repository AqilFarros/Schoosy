<?php

use App\Models\Book;
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
        Schema::create('video_books', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class)->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->string('url_youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_books');
    }
};
