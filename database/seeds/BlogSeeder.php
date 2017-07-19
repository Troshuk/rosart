<?php

use Illuminate\Database\Seeder;
use App\Blog;
class BlogSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		//


		DB::table('blogs')->insert(
			[
				[
					'blog_category_id'=> 1,
					'view'=>'5',
					'name_ru'=>'1 ru МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ',
					'name_en'=>'1 en МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ',
					'img'=>'pic3.jpg',
					'text_ru'=>'text ru 1',
					'text_en'=>'<p>text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 </p>',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',
				] ,
				[
					'blog_category_id'=> 2,
					'view'=>'50',
					'name_ru'=>'2 ru МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ',
					'name_en'=>'2 en МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ',
					'img'=>'pic2.jpg',
					'text_ru'=>'text ru 2',
					'text_en'=>'<p>text en 2 text en 2 text en 2 text en 2 text en 2text en 2text en 2 text en 2 text en 2text en 2 text en 2 text en</p>',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',
				],
				[
					'blog_category_id'=> 2,
					'view'=>'50',
					'name_ru'=>'3 ru МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ',
					'name_en'=>'3 en МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ',
					'img'=>'pic4.jpg',
					'text_ru'=>'text ru 3',
					'text_en'=>'<p>text en 3  text en 3  text en 3  <b>text en 3</b>  text en 3  text en 3  text en 3  text en 3  text en 3  text en 3  text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3</p>',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',
				]
			]
		);

		DB::table('blog_categories')->insert(
			[
				[
					'img'=>'pic1.jpg',
					'name_ru'=>'name ru 1',
					'name_en'=>'name en 1',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',

				],
				[
					'name_ru'=>'name ru 2',
					'name_en'=>'name en 2',
					'img'=>'pic2.jpg',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',

				],
				[
					'name_ru'=>'name ru 3',
					'name_en'=>'name en 3',
					'img'=>'pic3.jpg',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',

				],
			]);

	}
}
