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

class Abouts extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 140);

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
                    AdminFormElement::wysiwyg('text1_ru', 'Текст 1 RU')->setHeight(400)
                ], 4)
                ->addColumn([
                    AdminFormElement::wysiwyg('text2_ru', 'Текст 2 RU')->setHeight(400)
                ], 4)
                ->addColumn([
                    AdminFormElement::wysiwyg('text3_ru', 'Текст 3 RU')->setHeight(400)
                ], 4)
                ->addColumn([
                    AdminFormElement::image('img1', 'Изображение 1')->maxSize(1024)->required()
                ], 3)
                ->addColumn([
                    AdminFormElement::image('img2', 'Изображение 2')->maxSize(1024)->required()
                ], 3)
                ->addColumn([
                    AdminFormElement::image('img3', 'Изображение 3')->maxSize(1024)->required()
                ], 3)
                ->addColumn([
                    AdminFormElement::image('img4', 'Изображение 4')->maxSize(1024)->required()
                ], 3)
                ->addColumn([
                    AdminFormElement::images('imgs', 'ГАЛЕРЕЯ')->maxSize(1024)->storeAsComaSeparatedValue()
                ], 12)
        );

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::wysiwyg('text1_en', 'Текст 1 EN')->setHeight(400)
                ], 4)
                ->addColumn([
                    AdminFormElement::wysiwyg('text2_en', 'Текст 2 EN')->setHeight(400)
                ], 4)
                ->addColumn([
                    AdminFormElement::wysiwyg('text3_en', 'Текст 3 EN')->setHeight(400)
                ], 4)
        );

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($columnRu, 'RU');
        $tabs->appendTab($columnEn, 'EN');

        return $tabs;
    }
    
    public function getTitle()
    {
        return trans('О нас');
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
        return 'fa fa-address-card-o';
    }
}
