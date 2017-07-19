<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('blog_categories',
			function (Blueprint $table)
			{
				$table->increments('id');
				$table->integer('ord')->nullable();
				$table->string('img',255)->nullable();
				$table->string('name_ru',255)->nullable();
				$table->string('name_en',255)->nullable();
				$table->text('description_ru')->nullable();
				$table->text('description_en')->nullable();
				$table->text('metatitle_ru')->nullable();
				$table->text('metatitle_en')->nullable();
				$table->text('keywords_ru')->nullable();
				$table->text('keywords_en')->nullable();
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
		Schema::dropIfExists('blog_categories');
	}
}
