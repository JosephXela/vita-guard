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
        Schema::table('doctors', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id');//Buat Tabel Dulus
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('image', 1000)->default('img/doctors/no_image_preview.png');
            $table->string('specialization');
            $table->string('pengalaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);

            $table->dropColumn([
                'user_id',
                'image',
                'specialization',
                'pengalaman'
            ]);
        });
    }
};
