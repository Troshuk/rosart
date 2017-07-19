<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru',255)->nullable();
            $table->string('name_en',255)->nullable();
            $table->string('img',255)->nullable();
            $table->integer('master_id')->nullable();
            $table->decimal('price_rub',8, 2)->default(0);
            $table->decimal('price_eur',8, 2)->default(0);
            $table->string('size',255)->nullable();
            $table->string('year',255)->nullable();
            $table->text('metatitle_ru')->nullable();
            $table->text('metatitle_en')->nullable();
            $table->text('keywords_ru')->nullable();
            $table->text('keywords_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('amount')->default(1);
            $table->integer('active')->default(0);
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
        Schema::dropIfExists('products');
    }
}
