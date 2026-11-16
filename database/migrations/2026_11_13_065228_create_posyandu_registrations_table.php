<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posyandu_registrations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('child_id')
                ->constrained('children')
                ->cascadeOnDelete();

            $table->foreignId('schedule_id')
                ->constrained('posyandu_schedules')
                ->cascadeOnDelete();

            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak',
            ])->default('menunggu');

            $table->text('catatan_admin')->nullable();

            $table->timestamps();

            $table->unique(
                ['child_id', 'schedule_id'],
                'unique_child_schedule_registration'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posyandu_registrations');
    }
};
