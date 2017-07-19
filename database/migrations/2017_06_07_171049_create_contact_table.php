<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone',255)->nullable(); 
            $table->string('email',255)->nullable();  
            $table->string('adress_ru',255)->nullable();
            $table->string('adress_en',255)->nullable();
            $table->text('text_ru')->nullable();
            $table->text('text_en')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
