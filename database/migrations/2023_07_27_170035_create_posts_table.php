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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('tags')->nullable();
            $table->string('video')->nullable();
            $table->string('original_name')->nullable();
            $table->string('disk')->nullable();
            $table->string('path')->nullable();
            $table->datetime('converted_for_downloading_at')->nullable();
            $table->enum('status', ['Public', 'Unlisted', 'Private'])->default('Public');
            $table->boolean('is_nsfw')->default(false)->nullable();
            $table->datetime('converted_for_streaming_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
