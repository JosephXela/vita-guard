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
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->string('article_name');
            $table->string('content');
            
            $table->unsignedBigInteger('doctor_id');

            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->dropForeign(['doctor_id']);
            $table->dropColumn([
                'article_name',
                'content',
                'doctor_id'
            ]);
        });
    }
};
