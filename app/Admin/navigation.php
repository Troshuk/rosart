<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [

AdminNavigation::setFromArray([
  [
     'title' => 'Работы',
     'icon' => 'fa fa-paint-brush',
     'priority' => '28',
     'pages' => [
       [
          'title' => 'Мастера',
          'url' => 'admin/masters'
       ],
       [
          'title' => 'Техники',
          'url' => 'admin/techniques'
       ],
       [
          'title' => 'Категории работ',
          'url' => 'admin/categories'
       ],
       [
          'title' => 'Работы',
          'url' => 'admin/products'
       ],
     ]
   ],
  [
     'title' => 'Блог',
     'icon' => 'fa fa-newspaper-o',
     'priority' => '30',
     'pages' => [
        [
          'title' => 'Разделы',
          'url' => 'admin/blog_categories'
        ],
       [
          'title' => 'Статьи',
          'url' => 'admin/blogs'
        ]
     ]
   ],
    [
     'title' => 'Настройки SEO',
     'icon' => 'fa fa-cog',
     'priority' => '80',
     'pages' => [
        [
          'title' => 'О галерее',
          'url' => 'admin/settings/2/edit'
        ],
        [
          'title' => 'Мастера',
          'url' => 'admin/settings/3/edit'
        ],
        [
          'title' => 'Каталог',
          'url' => 'admin/settings/4/edit'
        ],
        [
          'title' => 'Популярные статьи',
          'url' => 'admin/settings/8/edit'
        ],
        [
          'title' => 'Блог',
          'url' => 'admin/settings/5/edit'
        ],
        [
          'title' => 'Главная',
          'url' => 'admin/settings/1/edit'
        ],
        [
          'title' => 'Контакты',
          'url' => 'admin/settings/6/edit'
        ],
        [
          'title' => 'Как купить',
          'url' => 'admin/settings/7/edit'
        ]
        
     ]
   ], 

])


/*
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],
*/
    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];