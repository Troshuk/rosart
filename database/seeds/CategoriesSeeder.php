<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(
			[
				[
					'img'=>'pic1.jpg',
					'name_ru'=>'Category_name ru 1',
					'name_en'=>'Category_name en 1',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',

				],
				[
					'name_ru'=>'Category_name ru 2',
					'name_en'=>'Category_name en 2',
					'img'=>'pic2.jpg',
					'metatitle_ru'=>'ru metatitle',
					'metatitle_en'=>'en metatitle',
					'keywords_ru'=>'ru keywords',
					'keywords_en'=>'en keywords',
					'description_ru'=> 'ru description',
					'description_en'=> 'en description',

				],
				[
					'name_ru'=>'Category_name ru 3',
					'name_en'=>'Category_name en 3',
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
