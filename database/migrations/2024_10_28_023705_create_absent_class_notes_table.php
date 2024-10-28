<?php

use App\Models\AbsentClass;
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
        Schema::create('absent_class_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AbsentClass::class)->references('id')->on('absent_classes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absent_class_notes');
    }
};
