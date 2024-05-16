<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketSoalMst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_soal_mst', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->boolean('tryout');
            $table->datetime('mulai')->nullable();
            $table->datetime('selesai')->nullable();
            $table->mediumText('banner')->nullable();
            $table->integer('jenis_penilaian')->default('1');
            $table->integer('bagi_jawaban')->default('1')->comment = '1=Bagi ; 0=Jangan Bagi';
            $table->integer('jenis_waktu')->default('1')->comment = '1=Perpaket ; 2=Persesi';
            $table->integer('sertifikat')->nullable()->default('1')->comment = '1=Ada ; 0=Tidak Ada';
            $table->integer('kkm')->nullable();
            $table->integer('waktu')->default('0')->comment = 'Menit';
            $table->integer('total_soal')->default('0');
            $table->mediumText('ket')->nullable();
            $table->mediumText('pengumuman')->nullable();
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
        Schema::dropIfExists('paket_soal_mst');
    }
}
