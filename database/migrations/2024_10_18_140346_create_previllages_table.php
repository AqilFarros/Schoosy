<?php

use App\Models\Classroom;
use App\Models\School;
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
        Schema::create('previllages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references("id")->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(School::class)->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->string('role');
            $table->foreignIdFor(Classroom::class)->nullable()->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previllages');
    }
};
