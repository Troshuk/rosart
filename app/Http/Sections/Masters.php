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
use App\Http\Controllers\IndexController;

class Masters extends Section implements Initializable
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
        return AdminDisplay::datatables()
           ->setHtmlAttribute('class', 'table-bordered table-success table-hover')
           ->setColumns(
               AdminColumn::link('name_ru', 'Имя')->setWidth('250px'),
               AdminColumn::link('profession_ru', 'Навыки')->setWidth('350px'),
               AdminColumn::image('img', 'Изображение')->setWidth('150px')
           )->setApply(function ($query) { $query->orderBy('profession_ru'); })->paginate(20);
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
                    AdminFormElement::text('profession_ru', 'Навыки RU')->required(),
                    AdminFormElement::textarea('text_ru', 'Биография RU')->setRows(5),
                    AdminFormElement::image('img', 'Изображение')->maxSize(1024)->required()
                ], 6)
                ->addColumn([
                    AdminFormElement::text('metatitle_ru', 'SEO title RU'),
                    AdminFormElement::textarea('description_ru', 'SEO description RU')->setRows(3),
                    AdminFormElement::textarea('keywords_ru', 'SEO keywords RU')->setRows(3)
                ], 6)
        );        

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name_en', 'Имя EN')->required(),
                    AdminFormElement::text('profession_en', 'Навыки EN')->required(),
                    AdminFormElement::textarea('text_en', 'Биография EN')->setRows(5)
                ], 6)
                ->addColumn([
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
        return trans('Мастера');
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
