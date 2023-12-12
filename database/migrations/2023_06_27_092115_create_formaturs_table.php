<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formaturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('kelas')->nullable();
            $table->string('role')->nullable();
            $table->string('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('formaturs');
    }
}
