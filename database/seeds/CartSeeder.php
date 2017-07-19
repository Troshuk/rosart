<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('order_statuses')->insert(
    		[
    		[
    		'name_ru'=>'В обработке',      
    		'name_en'=>'In processing',      
    		'ord'=>'1',
    		],
    		[
    		'name_ru'=>'Товар заказан',      
    		'name_en'=>'Item ordered',      
    		'ord'=>'2',
    		],
    		[
    		'name_ru'=>'Не оплачен',      
    		'name_en'=>'Not paid',      
    		'ord'=>'3',
    		],


    		]	); 


    	DB::table('orders')->insert(
    		[
    		[
    		'user_id'=>1,      
    		'status_id'=>1,      
    		],
    		]	); 

    	DB::table('order_products')->insert(
    		[
    		[
    		'order_id'=>1,      
    		'product_id'=>1,      
    		'price_rub'=>'30.00',
            'price_eur'=>'3.00',  
             
    		],
    		[
    		'order_id'=>1,      
    		'product_id'=>2,      
    		'price_rub'=>'30.00',
            'price_eur'=>'3.00', 
                  
    		],
    		[
    		'order_id'=>1,      
    		'product_id'=>3,      
    		'price_rub'=>'30.00',
            'price_eur'=>'3.00',  
             
    		],

    		]	); 

    }
}
