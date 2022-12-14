<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahTable extends Migration
{
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_matkul', 30);
            $table->integer('sks');
            $table->integer('jam');
            $table->string('semester', 25);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
}
