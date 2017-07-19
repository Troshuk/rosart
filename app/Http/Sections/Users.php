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

class Users extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 70, function() {
            return \App\User::count();
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
            AdminColumn::link('name', 'Имя')->setWidth('200px'),
            AdminColumn::link('email', 'Email')->setWidth('200px'),
            AdminColumn::link('phone', 'Телефон')->setWidth('200px'),
            AdminColumn::link('address', 'Адресс')->setWidth('300px')
        ]);

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
        return trans('Пользователи');
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
        return 'fa fa-group';
    }
}
