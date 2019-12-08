<?php

namespace App;

use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Traits\AdminBuilder;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use AdminBuilder, ModelTree {
        ModelTree::boot as treeBoot;
    }
}
