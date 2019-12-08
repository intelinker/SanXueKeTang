<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->string('filepath')->nullable();
            $table->unsignedInteger('admin_user_id')->nullable()->index();
            $table->foreign('admin_user_id')->references('id')->on('admin_users')->onUpdate('cascade');
            $table->unsignedBigInteger('article_type_id')->nullable()->index();
            $table->foreign('article_type_id')->references('id')->on('article_types')->onUpdate('cascade');
            $table->unsignedBigInteger('article_positions_id')->nullable()->index();
            $table->foreign('article_positions_id')->references('id')->on('article_positions')->onUpdate('cascade');
            $table->unsignedBigInteger('article_categories_id')->nullable()->index();
            $table->foreign('article_categories_id')->references('id')->on('article_categories')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
