<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
use Config;
use Session;
use App\Category;
use App\Contact;
use App\Http\Controllers\IndexController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (Schema::hasTable('categories')) {
            $lang = Config::get('app.locale');    
            $categories = Category::select('id','img', 'href',
                'name_'.$lang.' as name' ,
                'metatitle_'.$lang.' as metatitle',
                'keywords_'.$lang.' as keywords',
                'description_'.$lang.' as description'
                )
            ->orderBy('ord')
            ->get();

            $soc = Contact::select('fb', 'vk')->first();

            View::share('categories',$categories);
            View::share('soc',$soc);

            view()->composer('*', function ($view) {
                $view->with('currency', IndexController::getCurrency());    
            });  
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
