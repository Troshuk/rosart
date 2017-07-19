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

class OrderStatuses extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 25, function() {
            return \App\OrderStatus::count();
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
            AdminColumn::text('ord', 'Порядок')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::link('name_ru', 'Имя')->setWidth('400px'),
            AdminColumn::order()
               ->setLabel('Изменить порядок')
               ->setHtmlAttribute('class', 'text-center')
               ->setWidth('100px')
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
        $column = AdminFormElement::columns([
            [
                AdminFormElement::text('name_ru', 'Имя RU')->required()
            ]
        ]);
        $column->addColumn(function() {
            return [
                AdminFormElement::text('name_en', 'Имя EN')->required()
            ];
        });        

        return AdminForm::panel()->addBody([
            $column
        ]);
       
        return $column;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }


    public function getTitle()
    {
        return trans('Статусы заказов');
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
        return 'fa fa-check';
    }
}
