<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('products')->insert(
    		[
    		[
    		'name_ru'=>'RU ДЕВУШКА В КРАСНОМ ПЛАТКЕ',      
    		'name_en'=>'EN ДЕВУШКА В КРАСНОМ ПЛАТКЕ',      
    		'img'=>'pic1.jpg',
    		'master_id'=>1,
            'price_rub'=>'30.00',
            'price_eur'=>'3.00',
            'size'=>'1,12 х 0,6 м',
            'year'=>'2017',	
            'metatitle_ru'=>'ru metatitle',
            'metatitle_en'=>'en metatitle',
            'keywords_ru'=>'ru keywords',
            'keywords_en'=>'en keywords',
            'description_ru'=> 'ru description',
            'description_en'=> 'en description',
            ],
            [
            'name_ru'=>'RU Цикл Литографий  «Маскарад» Лит.№26',      
            'name_en'=>'EN Цикл Литографий  «Маскарад» Лит.№26',      
            'img'=>'pic2.jpg',
            'master_id'=>1,
            'price_rub'=>'30.00',
            'price_eur'=>'3.00',
            'size'=>'1,12 х 0,6 м',
            'year'=>'2017',	
            'metatitle_ru'=>'ru metatitle',
            'metatitle_en'=>'en metatitle',
            'keywords_ru'=>'ru keywords',
            'keywords_en'=>'en keywords',
            'description_ru'=> 'ru description',
            'description_en'=> 'en description',
            ],
            [
            'name_ru'=>'RU  «Маска» Лит.№1',      
            'name_en'=>'EN  «Маска» Лит.№1',      
            'img'=>'pic3.jpg',
            'master_id'=>3,
            'price_rub'=>'30.00',
            'price_eur'=>'3.00',
            'size'=>'1,12 х 0,6 м',
            'year'=>'2017',	
            'metatitle_ru'=>'ru metatitle',
            'metatitle_en'=>'en metatitle',
            'keywords_ru'=>'ru keywords',
            'keywords_en'=>'en keywords',
            'description_ru'=> 'ru description',
            'description_en'=> 'en description',
            ],


            ]	); 




        DB::table('product_technique')->insert(
            [
            [
            'product_id'=>1,
            'technique_id'=>1,
            ],
            [
            'product_id'=>1,
            'technique_id'=>2,
            ],
            [
            'product_id'=>1,
            'technique_id'=>3,
            ],

[
            'product_id'=>2,
            'technique_id'=>1,
            ],
            [
            'product_id'=>3,
            'technique_id'=>2,
            ],
            [
            'product_id'=>3,
            'technique_id'=>1,
            ],

            ]   ); 


        DB::table('category_product')->insert(
            [
            [
            'product_id'=>1,
            'category_id'=>1,
            ],
            [
            'product_id'=>1,
            'category_id'=>2,
            ],
            [
            'product_id'=>1,
            'category_id'=>3,
            ],
            [
            'product_id'=>2,
            'category_id'=>1,
            ],[
            'product_id'=>2,
            'category_id'=>1,
            ],[
            'product_id'=>2,
            'category_id'=>1,
            ],

[
            'product_id'=>3,
            'category_id'=>2,
            ],[
            'product_id'=>3,
            'category_id'=>3,
            ],[
            'product_id'=>3,
            'category_id'=>4,
            ],



            ]   ); 
    }
}
