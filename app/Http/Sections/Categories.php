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
use App\Http\Controllers\IndexController;

class Categories extends Section implements Initializable
{

    public function initialize()
    {
        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {

        });
        $this->updating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            if($model->name_ru){
                $model->href = IndexController::getHref($model->name_ru);
                $model->save();
            }
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
        $display->setApply(function ($query) {
            $query->orderBy('ord', 'asc');
        });
        $display->setColumns([
            AdminColumn::text('ord', '#')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::link('name_ru', 'Имя')->setWidth('200px'),
            AdminColumn::image('img', 'Изображение')->setWidth('100px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::order()
               ->setLabel('Изменить порядок')
               ->setHtmlAttribute('class', 'text-center')
               ->setWidth('100px'),
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

        $columnRu = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name_ru', 'Имя RU')->required(),
                    AdminFormElement::text('metatitle_ru', 'SEO title RU'),
                    AdminFormElement::textarea('description_ru', 'SEO description RU')->setRows(3),
                    AdminFormElement::textarea('keywords_ru', 'SEO keywords RU')->setRows(3)
                ], 6)
                ->addColumn([
                    AdminFormElement::image('img', 'Изображение')->maxSize(1024)->required()
                ], 2)

        );        

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name_en', 'Имя EN')->required(),
                    AdminFormElement::text('metatitle_en', 'SEO title EN'),
                    AdminFormElement::textarea('description_en', 'SEO description EN')->setRows(3),
                    AdminFormElement::textarea('keywords_en', 'SEO keywords EN')->setRows(3)
                ], 6)

        );
       

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($columnRu, 'RU');
        $tabs->appendTab($columnEn, 'EN');

        return $tabs;
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
        return trans('Категории работ');
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
        return 'fa fa-newspaper-o';
    }
}
