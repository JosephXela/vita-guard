<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('consultations', function (Blueprint $table) {

            $table->foreignId('booking_id')
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();

            $table->dropForeign(['user_id']);
            $table->dropForeign(['doctor_id']);

            $table->dropColumn([
                'user_id',
                'doctor_id',
                'message',
                'reply',
                'notes'
            ]);
        });

        DB::statement("
            ALTER TABLE consultations
            MODIFY status
            ENUM('ACTIVE','CLOSED')
            NOT NULL DEFAULT 'ACTIVE'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE consultations
            MODIFY status
            ENUM('pending','replied')
            NOT NULL DEFAULT 'pending'
        ");

        Schema::table('consultations', function (Blueprint $table) {

            // hapus foreign key booking
            $table->dropForeign(['booking_id']);

            // hapus kolom baru
            $table->dropColumn([
                'booking_id',
                'started_at',
                'ended_at'
            ]);

            // kembalikan kolom lama
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doctor_id');

            $table->text('message');
            $table->text('reply')->nullable();
            $table->text('notes')->nullable();

            // kembalikan foreign key
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade');
        });
    }
};
