<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjams', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('email_user');
            $table->text('nama_peminjam',255);
            $table->text('alasan',255);
            $table->integer('lantai');
            $table->string('nama_ruangan');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_selesai');
            $table->time('jam_pinjam');
            $table->time('jam_selesai');
            $table->string('status');
            $table->integer('no_peminjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_peminjams');
    }
};
