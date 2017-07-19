<?php

use Illuminate\Database\Seeder;

class TechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('techniques')->insert([
			[
    		'name_ru'=>'RU Карандаш',  
    		'name_en'=>'EN Карандаш',  	   			
			],
			[
    		'name_ru'=>'RU Акрил',  
    		'name_en'=>'EN Акрил',  
			],
			[
    		'name_ru'=>'RU Акварель',  
    		'name_en'=>'EN Акварель',  
			],
			[
    		'name_ru'=>'RU Масло',  
    		'name_en'=>'EN Масло',  
			],
			[
    		'name_ru'=>'RU Тушь',  
    		'name_en'=>'EN Тушь',  
			],
			[
    		'name_ru'=>'RU Каменая живопись',  
    		'name_en'=>'EN Каменая живопись',  
			],

			
		  								]);  
    }
}
