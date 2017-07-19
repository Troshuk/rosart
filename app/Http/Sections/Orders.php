<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use App\Product;
use App\User;
use App\OrderStatus;

class Orders extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 15, function() {
            return \App\Order::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {

        });
    }

    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatables();
        $display->setHtmlAttribute('class', 'table-bordered table-success table-hover');
        $display->setColumns([
            AdminColumn::link('id', 'ID')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::link('user.name', 'Имя')->setWidth('100px'),
            AdminColumn::link('user.email', 'Email')->setWidth('100px'),
            AdminColumn::link('phone', 'Телефон')->setWidth('100px'),
            AdminColumn::link('address', 'Адресс')->setWidth('200px'),
            AdminColumn::link('status.name_ru', 'Статус')->setWidth('100px'),
        ]);

        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $column = AdminFormElement::columns()
            ->addColumn([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('id', 'ID')->setReadOnly(true)
                    ], 6)
                    ->addColumn([
                        AdminFormElement::text('id', 'user ID')->setReadOnly(true)
                    ], 6),
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('price', 'Валюта')->setReadOnly(true)
                    ], 6)
                    ->addColumn([
                        AdminFormElement::text('lang', 'Язык')->setReadOnly(true)
                    ], 6),
                AdminFormElement::select('status_id', 'Статус')->setModelForOptions(OrderStatus::class)->setDisplay('name_ru')
            ], 4)
            ->addColumn([
                AdminFormElement::text('user.name', 'Имя')->setReadOnly(true),
                AdminFormElement::text('user.phone', 'Телефон')->setReadOnly(true),
                AdminFormElement::text('user.email', 'Email')->setReadOnly(true)
            ], 3)
            ->addColumn([
                AdminFormElement::textarea('text', 'Доп. информация')->setRows(8)
            ], 5);


        return AdminForm::panel()->addBody([
            $column
        ]);
    }

    /**
     * @return FormInterface
     */
/*
    public function onCreate()
    {
        return $this->onEdit(null);
    }
*/

    public function getTitle()
    {
        return trans('Заказы');
    }

    public function isDeletable(\Illuminate\Database\Eloquent\Model $model)
    {
        return true;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-cart-plus';
    }
}
