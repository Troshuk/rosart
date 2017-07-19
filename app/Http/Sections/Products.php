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
use App\Category;
use App\Technique;
use App\Master;
use App\Http\Controllers\IndexController;

class Products extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе


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
        $display->setColumns([
            AdminColumn::text('id', 'ID')->setWidth('30px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::link('name_ru', 'Имя')->setWidth('300px'),
            AdminColumn::image('img', 'Изображение')->setWidth('100px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('amount', 'Количество')->setWidth('50px'),
            AdminColumnEditable::checkbox('active', 'Активный', 'Неактивный')->setLabel('Активность')->setWidth('50px'),
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
                    AdminFormElement::textarea('description_ru', 'SEO description RU')->setRows(6),
                    AdminFormElement::textarea('keywords_ru', 'SEO keywords RU')->setRows(6)
                ], 5)
                ->addColumn([
                    AdminFormElement::columns()
                        ->addColumn([
                            AdminFormElement::number('price_eur', 'Цена EUR')->setStep(0.01)->setDefaultValue(0.00)->required(),
                        ], 6)
                        ->addColumn([
                            AdminFormElement::number('price_rub', 'Цена RUB')->setStep(0.01)->setDefaultValue(0.00)->required(),
                        ], 6),
                    AdminFormElement::columns()
                        ->addColumn([
                            AdminFormElement::text('size', 'Размер')->required(),
                        ], 6)
                        ->addColumn([
                            AdminFormElement::number('year', 'Год')->setDefaultValue(date("Y"))->required(),
                        ], 6),
                    AdminFormElement::multiselect('categorys', 'Категория', Category::class)->setDisplay('name_ru')->required(),
                    AdminFormElement::multiselect('techniques', 'Техника', Technique::class)->setDisplay('name_ru')->required(),
                    AdminFormElement::select('master_id', 'Мастер')->setModelForOptions(Master::class)->setDisplay('name_ru')->required(),
                    AdminFormElement::columns()
                        ->addColumn([
                            AdminFormElement::radio('active', 'Активность')->setOptions(['1' => 'Активный', '0' => 'Неактивный'])->required(),
                        ], 6)
                        ->addColumn([
                            AdminFormElement::number('amount', 'Количество')->setDefaultValue(1)->required(),
                        ], 6),
                ], 5)
                ->addColumn([
                    AdminFormElement::image('img', 'Изображение')->maxSize(1024)->required()
                ], 2)
                ->addColumn([
                    AdminFormElement::images('imgs', 'Доп. изображения')->maxSize(1024)->storeAsComaSeparatedValue()
                ], 12)

        );        

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name_en', 'Имя EN')->required(),
                    AdminFormElement::text('metatitle_en', 'SEO title EN'),
                    AdminFormElement::textarea('description_en', 'SEO description EN')->setRows(6),
                    AdminFormElement::textarea('keywords_en', 'SEO keywords EN')->setRows(6)
                ], 5)

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
        return trans('Работы');
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
