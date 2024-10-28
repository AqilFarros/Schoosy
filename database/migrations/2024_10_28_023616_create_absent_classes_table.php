<?php

use App\Models\Classroom;
use App\Models\School;
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
        Schema::create('absent_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(School::class)->references('id')->on('schools')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Classroom::class)->references('id')->on('classrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absent_classes');
    }
};