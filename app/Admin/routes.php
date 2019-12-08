<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'UserController@index')->name('admin.home');
    $router->resource('users', UserController::class);
    $router->resource('articles', ArticleController::class);
    $router->resource('responses', ResponseController::class);
    $router->resource('article-categories', ArticleCategoryController::class);
    $router->resource('media', MediaController::class);
});
