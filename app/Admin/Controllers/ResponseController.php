<?php

namespace App\Admin\Controllers;

use App\Response;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ResponseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Response';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Response);

        $grid->column('id', __('Id'));
        $grid->column('user_id', '用户名');
        $grid->column('response_categories_id', __('Response categories id'));
        $grid->column('description', __('Description'));
        $grid->column('contact', __('Contact'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Response::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('response_categories_id', __('Response categories id'));
        $show->field('description', __('Description'));
        $show->field('contact', __('Contact'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Response);

        $form->number('user_id', __('User id'));
        $form->number('response_categories_id', __('Response categories id'));
        $form->text('description', __('Description'));
        $form->text('contact', __('Contact'));

        return $form;
    }
}
