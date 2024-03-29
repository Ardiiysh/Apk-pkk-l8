<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriRumahTanggasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industri_rumah_tanggas', function (Blueprint $table) {
            $table->increments('id_industri_rumah_tangga');
            $table->string('kategori');
            $table->string('komoditi');
            $table->text('keterangan');
            $table->integer('is_user_id');
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
        Schema::dropIfExists('industri_rumah_tanggas');
    }
}
