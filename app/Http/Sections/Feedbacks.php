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

class Feedbacks extends Section implements Initializable
{

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 5, function() {
            return \App\Feedback::count();
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
        return AdminDisplay::datatables()
           ->setHtmlAttribute('class', 'table-bordered table-success table-hover')
           ->setColumns(
               AdminColumn::link('id', '#')->setWidth('30px'),
               AdminColumn::link('name', 'Имя')->setWidth('100px'),
               AdminColumn::link('phone', 'Телефон')->setWidth('100px'),
               AdminColumn::link('email', 'Почта')->setWidth('100px'),
               AdminColumn::link('question', 'Сообщение')->setWidth('400px')
           )->setApply(function ($query) { $query->orderBy('id', 'desc'); })->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $column3 = AdminFormElement::columns([
            [
                AdminFormElement::text('name', 'Имя')
            ]
        ]);
        $column3->addColumn(function() {
            return [
                AdminFormElement::text('phone', 'Телефон')
            ];
        });
        $column3->addColumn(function() {
            return [
                AdminFormElement::text('email', 'Почта')
            ];
        }); 

        return AdminForm::panel()->addBody([
            $column3,
            AdminFormElement::textarea('question', 'Сообщение')->setRows(5)
        ]);
    }


    public function getTitle()
    {
        return trans('Обратная связь');
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
        return 'fa fa-comments';
    }
}
