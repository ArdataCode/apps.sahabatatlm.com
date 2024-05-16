<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUMapelMst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_mapel_mst', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_user_id');
            $table->integer('fk_mapel_mst');
            $table->integer('tryout');
            $table->integer('jenis_waktu')->default('1')->comment = '1=Perpaket ; 2=Persesi';
            $table->integer('jenis_penilaian')->comment = '1=Rata-rata ; 2=Point';
            $table->string('judul');
            $table->integer('kkm')->nullable();
            $table->integer('nilai')->default('0');
            $table->integer('point')->default('0')->nullable();
            $table->integer('waktu')->comment = 'Menit';
            $table->datetime('mulai')->nullable();
            $table->datetime('selesai')->nullable();
            $table->integer('bagi_jawaban')->default('1')->comment = '1=Bagi ; 0=Jangan Bagi';
            $table->integer('sertifikat')->default('1')->comment = '1=Ada ; 0=Tidak Ada';
            $table->integer('is_mengerjakan')->default('0')->comment = '0 = Selesai ; 1 = Sedang Mengerjakan';
            $table->integer('total_soal')->default('0');
            $table->integer('set_nilai')->nullable();
            $table->string('set_predikat')->nullable();
            $table->integer('status')->default('1')->comment = '0 = Tidak Tampil ; 1 = Tampil';
            $table->mediumText('ket')->nullable();
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
        Schema::dropIfExists('u_mapel_mst');
    }
}
