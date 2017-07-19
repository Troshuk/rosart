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


class Settings extends Section implements Initializable
{

    public function initialize()
    {
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
/*
    public function onDisplay()
    {

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
                    AdminFormElement::text('metatitle_ru', 'SEO title RU'),
                    AdminFormElement::textarea('description_ru', 'SEO description RU')->setRows(3),
                    AdminFormElement::textarea('keywords_ru', 'SEO keywords RU')->setRows(3)
                ], 8)

        );        

        $columnEn = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('metatitle_en', 'SEO title EN'),
                    AdminFormElement::textarea('description_en', 'SEO description EN')->setRows(3),
                    AdminFormElement::textarea('keywords_en', 'SEO keywords EN')->setRows(3)
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
        return trans('Настройки');
    }

    public function isDeletable(\Illuminate\Database\Eloquent\Model $model)
    {
        return false;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-newspaper-o';
    }
}
