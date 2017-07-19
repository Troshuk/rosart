<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

class Contacts extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 150);

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
/*
    public function onDisplay()
    {
        return AdminDisplay::table()
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '#')->setWidth('30px'),
               AdminColumn::text('name', 'Имя')->setWidth('30px'),
               AdminColumn::text('phone', 'Телефон')->setWidth('30px'),
               AdminColumn::text('email', 'Почта')->setWidth('30px'),
               AdminColumn::text('text', 'Комментарий')->setWidth('200px')
           )->setApply(function ($query) { $query->orderBy('id', 'desc'); })->paginate(20);
    }
*/
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $columnRu = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    
                    AdminFormElement::textarea('text_ru', 'Текст RU')->setRows(3),
                    AdminFormElement::wysiwyg('adress_ru', 'Адрес RU')
                ], 8)
                ->addColumn([
                    AdminFormElement::text('phone', 'Телефон')->required(),
                    AdminFormElement::text('email', 'Email')->required(),
                    AdminFormElement::text('fb', 'Facebook url')->required(),
                    AdminFormElement::text('vk', 'VK url')->required()
                ], 2)
        );        

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::textarea('text_en', 'Текст EN')->setRows(3),
                    AdminFormElement::wysiwyg('adress_en', 'Адрес EN')
                ], 8)

        );
       

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($columnRu, 'RU');
        $tabs->appendTab($columnEn, 'EN');

        return $tabs;
    }
    
    public function getTitle()
    {
        return trans('Контакты');
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
        return 'fa fa-address-book';
    }
}
