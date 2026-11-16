<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('judul', 200);
            $table->string('slug')->unique();
            $table->string('kategori', 100);
            $table->string('ringkasan', 500)->nullable();
            $table->longText('isi');

            $table->string('gambar')->nullable();

            $table->enum('status', ['draft', 'published'])
                ->default('published');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
