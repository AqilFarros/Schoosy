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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references("id")->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('description');
            $table->string('image');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('code')->nullable()->unique();
            $table->boolean('approve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
