<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade');

            //Booking Date
            $table->date('booking_date');
            $table->time('booking_time');

            //Status Booking
            $table->enum('status', ['pending', 'disetujui', 'selesai', 'cancel'])
                ->default('pending');

            //Catatan Buat Dokter
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['doctor_id']);

            $table->dropColumn([
                'user_id',
                'doctor_id',
                'booking_date',
                'booking_time',
                'status',
                'notes'
            ]);
        });
    }
};
