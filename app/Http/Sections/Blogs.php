<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use AdminColumnEditable;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use App\BlogCategory;
use App\Http\Controllers\IndexController;


class Blogs extends Section implements Initializable
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
        $display->setHtmlAttribute('class', 'table-bordered table-primary table-hover');
        $display->setColumns([
            AdminColumn::link('id', '#')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('blog_category.name_ru', 'Категория')->setWidth('100px'),
            AdminColumn::link('name_ru', 'Название статьи')->setWidth('300px'),
            AdminColumn::image('img', 'Изображение')->setWidth('100px')->setHtmlAttribute('class', 'text-center'),
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
                    AdminFormElement::textarea('keywords_ru', 'SEO keywords RU')->setRows(3),
                    AdminFormElement::textarea('subtext_ru', 'Краткое описание (для рассылки) RU')->setRows(5),
                    AdminFormElement::wysiwyg('text_ru', 'Текст RU')->required(),
                    AdminFormElement::text('user_name_ru', 'Автор RU')->required()
                ], 8)
                ->addColumn([
                    AdminFormElement::radio('send', 'Рассылка')->setOptions(['1' => 'Рассылать', '0' => 'Не рассылать'])->required(),
                    AdminFormElement::select('blog_category_id', 'Категория')->setModelForOptions(BlogCategory::class)->setDisplay('name_ru')->required(),
                    AdminFormElement::image('img', 'Изображение')->maxSize(1024)->required()
                ], 2)

        );        

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name_en', 'Имя EN')->required(),
                    AdminFormElement::text('metatitle_en', 'SEO title EN'),
                    AdminFormElement::textarea('description_en', 'SEO description EN')->setRows(3),
                    AdminFormElement::textarea('keywords_en', 'SEO keywords EN')->setRows(3),
                    AdminFormElement::textarea('subtext_en', 'Краткое описание (для рассылки) EN')->setRows(5),
                    AdminFormElement::wysiwyg('text_en', 'Текст EN')->required(),
                    AdminFormElement::text('user_name_en', 'Автор EN')->required()
                ], 8)

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
        return trans('Блог');
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
