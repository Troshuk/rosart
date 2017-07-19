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

class OrderProducts extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 20, function() {
            return \App\OrderProduct::count();
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
            AdminColumn::link('id', '#')->setWidth('50px'),
            AdminColumn::link('order_id', 'ID заказа')->setWidth('50px'),
            AdminColumn::link('product_id', 'ID товара')->setWidth('50px'),
            AdminColumn::link('product.name_ru', 'Продукт')->setWidth('200px'),
            AdminColumn::link('order.phone', 'Телефон заказчика')->setWidth('100px'),
            AdminColumn::link('price_rub', 'Цена RUB')->setWidth('50px'),
            AdminColumn::link('price_eur', 'Цена EUR')->setWidth('50px'),
            AdminColumn::link('product.amount', 'Осталось')->setWidth('50px')
        ]);
        $display->setApply(function ($query) {
            $query->orderBy('id', 'desc');
        });

        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    /*
    public function onEdit($id)
    {
        $column = AdminFormElement::columns()
                ->addColumn([
                     AdminFormElement::columns()
                        ->addColumn([
                            AdminFormElement::number('id', 'ID товара')->setReadOnly(true)
                        ], 6)
                        ->addColumn([
                            AdminFormElement::number('amount', 'Осталось')->setReadOnly(true)
                        ], 6),
                    AdminFormElement::columns()
                        ->addColumn([
                            AdminFormElement::number('product.price_eur', 'Цена EUR')->setReadOnly(true)
                        ], 6)
                        ->addColumn([
                            AdminFormElement::number('product.price_rub', 'Цена RUB')->setReadOnly(true)
                        ], 6),
                    AdminFormElement::columns()
                        ->addColumn([
                            AdminFormElement::text('product.size', 'Размер')->setReadOnly(true)
                        ], 6)
                        ->addColumn([
                            AdminFormElement::number('product.year', 'Год')->setReadOnly(true)
                        ], 6),
                ], 4)
            ->addColumn([
                AdminFormElement::text('id', 'ID')->setReadOnly(true),
                AdminFormElement::select('status_id', 'Статус')->setModelForOptions(OrderStatus::class)->setDisplay('name_ru'),
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::text('price', 'Валюта')->setReadOnly(true),
                    ], 6)
                    ->addColumn([
                        AdminFormElement::text('lang', 'Язык')->setReadOnly(true)
                    ], 6)
            ], 3)
            ->addColumn([
                AdminFormElement::text('user.name', 'Имя')->setReadOnly(true),
                AdminFormElement::text('user.phone', 'Телефон')->setReadOnly(true),
                AdminFormElement::text('user.email', 'Email')->setReadOnly(true)
            ], 3)
            ->addColumn([
                AdminFormElement::textarea('text', 'Доп. информация')->setRows(8)
            ], 6);


        return AdminForm::panel()->addBody([
            $column
        ]);
    }
*/
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
        return trans('Работы в заказах');
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
        return 'fa fa-cart-arrow-down';
    }
}
