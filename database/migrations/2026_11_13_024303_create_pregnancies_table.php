<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('nik', 16)->unique();
            $table->string('nama_ibu', 100);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_hp', 20)->nullable();

            $table->date('tanggal_hpht')->nullable();
            $table->date('tanggal_hpl')->nullable();

            $table->string('nama_suami', 100)->nullable();
            $table->string('golongan_darah', 3)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pregnancies');
    }
};
