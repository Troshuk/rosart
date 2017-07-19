<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        \App\Master::class => 'App\Http\Sections\Masters',
        \App\Category::class => 'App\Http\Sections\Categories',
        \App\Technique::class => 'App\Http\Sections\Techniques',
        \App\Product::class => 'App\Http\Sections\Products',
        \App\BlogCategory::class => 'App\Http\Sections\BlogCategories',
        \App\Blog::class => 'App\Http\Sections\Blogs',
        \App\About::class => 'App\Http\Sections\Abouts',
        \App\Order::class => 'App\Http\Sections\Orders',
        \App\OrderStatus::class => 'App\Http\Sections\OrderStatuses',
        \App\User::class => 'App\Http\Sections\Users',
        \App\Contact::class => 'App\Http\Sections\Contacts',
        \App\Feedback::class => 'App\Http\Sections\Feedbacks',
        \App\OrderProduct::class => 'App\Http\Sections\OrderProducts',
        \App\Setting::class => 'App\Http\Sections\Settings',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
