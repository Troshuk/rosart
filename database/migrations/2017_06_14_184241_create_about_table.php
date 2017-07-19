<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img1',255)->nullable();
            $table->string('img2',255)->nullable();
            $table->string('img3',255)->nullable();
            $table->string('img4',255)->nullable();
            $table->text('text1_ru')->nullable();
            $table->text('text1_en')->nullable();
            $table->text('text2_ru')->nullable();
            $table->text('text2_en')->nullable();
            $table->text('text3_ru')->nullable();
            $table->text('text3_en')->nullable();           
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
        Schema::dropIfExists('about');
    }
}
