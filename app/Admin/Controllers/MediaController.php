<?php

namespace App\Admin\Controllers;

use App\Media;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MediaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Media';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Media);

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('filename', __('Filename'));
        $grid->column('format', __('Format'));
        $grid->column('description', __('Description'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('path', __('Path'));
        $grid->column('duration', __('Duration'));
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
        $show = new Show(Media::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('filename', __('Filename'));
        $show->field('format', __('Format'));
        $show->field('description', __('Description'));
        $show->field('avatar', __('Avatar'));
        $show->field('path', __('Path'));
        $show->field('duration', __('Duration'));
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
        $form = new Form(new Media);

        $form->text('title', __('Title'));
        $form->text('filename', __('Filename'));
        $form->text('format', __('Format'));
        $form->text('description', __('Description'));
        $form->image('avatar', __('Avatar'));
        $form->text('path', __('Path'));
        $form->text('duration', __('Duration'));

        return $form;
    }
}
