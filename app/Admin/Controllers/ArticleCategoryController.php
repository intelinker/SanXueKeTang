<?php

namespace App\Admin\Controllers;

use App\ArticleCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;

class ArticleCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章分类';

    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title('分类管理')
            ->description(trans('admin.list'))
            ->row(function (Row $row) {
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('article-categories'));

                    $form->select('parent_id', '父级分类')->options(ArticleCategory::selectOptions());
                    $form->text('title', trans('admin.title'))->rules('required');
                    $form->image('avatar', trans('admin.icon'));
                    $form->text('description', trans('admin.description'));

                    $form->hidden('_token')->default(csrf_token());

                    $column->append((new Box(trans('admin.new'), $form))->style('success'));
                });
            });
    }

    /**
     * @return \Encore\Admin\Tree
     */
    protected function treeView()
    {
        return ArticleCategory::tree(function (Tree $tree) {
            $tree->disableCreate();

            $tree->branch(function ($branch) {
//                dd($branch);
                if ($branch['avatar']) {
                    $payload = "<img style='width: 20px' src='/uploads/{$branch['avatar']}'>&nbsp;<strong>{$branch['title']}</strong>{$branch['description']}";
                } else {
                    $payload = "&nbsp;<strong>{$branch['title']}</strong>&nbsp;&nbsp;&nbsp;{$branch['description']}";
                }

//                if (!isset($branch['children'])) {
//                    if (url()->isValidUrl($branch['uri'])) {
//                        $uri = $branch['uri'];
//                    } else {
//                        $uri = admin_url($branch['uri']);
//                    }

//                    $payload .= "&nbsp;&nbsp;&nbsp;<a href=\"$uri\" class=\"dd-nodrag\">$uri</a>";
//                }

                return $payload;
            });
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $categoryModel = new ArticleCategory();
        $form = new Form(new ArticleCategory);

        $form->select('parent_id', '父级分类')->options($categoryModel::selectOptions())->default(1);
        $form->text('title', '标题')->required();
        $form->text('description', trans('description'));
        $form->image('avatar', trans('avatar'));
        $form->number('order', __('Order'))->default(1)->setDisplay(false);

        return $form;
    }
}
