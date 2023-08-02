<?php

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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('model');
            $table->unsignedBigInteger('user_id');
            $table->string('filename');
            $table->string('video')->nullable();
            $table->string('original_name')->nullable();
            $table->string('disk')->nullable();
            $table->string('path')->nullable();
            $table->datetime('converted_for_downloading_at')->nullable();
            $table->datetime('converted_for_streaming_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
