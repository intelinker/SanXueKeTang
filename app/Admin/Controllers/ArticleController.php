<?php

namespace App\Admin\Controllers;

use App\Article;
use App\ArticleCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;
use Encore\Admin\Facades\Admin;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('content', __('Content'));
        $grid->column('filepath', __('Filepath'));
        $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('article_type_id', __('Article type id'));
        $grid->column('article_positions_id', __('Article positions id'));
        $grid->column('article_categories_id', __('Article categories id'));
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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('content', __('Content'));
        $show->field('filepath', __('Filepath'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('article_type_id', __('Article type id'));
        $show->field('article_positions_id', __('Article positions id'));
        $show->field('article_categories_id', __('Article categories id'));
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
        $form = new Form(new Article);

        $form->text('title', '标题');
        $form->text('description', trans('description'));
        $form->summernote('content', '内容');
        $form->largefile('filepath', '上传文件');
        $form->number('admin_user_id', __('Admin user id'))->setDisplay(false)->default(Admin::user()->id);
//        $form->select('article_type_id', __('Article type id'));
//        $form->number('article_positions_id', __('Article positions id'));
        $form->select('article_categories_id', '分类')->options(ArticleCategory::selectOptions())->default(1);             ;

        return $form;
    }
}
