<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->unsignedInteger('max_people')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('location')->nullable();
            $table->boolean('is_public')->default(true);
            $table->boolean('requires_verification')->default(false);
            $table->string('image_path')->nullable(); // if using single image
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
