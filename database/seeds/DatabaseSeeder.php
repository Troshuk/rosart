<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BlogSeeder::class);
	     $this->call(MastersSeeder::class);
	     $this->call(ContactsSeeder::class);
         $this->call(AboutSeeder::class);
	     $this->call(CategoriesSeeder::class);
         $this->call(TechniqueSeeder::class);
         $this->call(ProductsSeeder::class);  
         $this->call(CartSeeder::class);  
         $this->call(FeedbackSeeder::class);  

         
         

         
	     
    }
}
