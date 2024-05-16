<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUPaketSoalEssayDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_paket_soal_essay_dtl', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_user_id');
            $table->integer('fk_u_paket_soal_mst');
            $table->integer('fk_u_paket_soal_ktg');
            $table->integer('no_soal');
            $table->mediumText('soal');
            $table->mediumText('jawaban')->nullable();
            $table->mediumText('jawaban_user')->nullable();
            $table->mediumText('jawaban_userfile')->nullable();
            $table->integer('nilai')->default('0');
            $table->integer('point')->default('0');
            $table->integer('created_by');
            $table->datetime('created_at');
            $table->integer('updated_by')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('u_paket_soal_essay_dtl');
    }
}
