<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag')->uniquer()->comment('标签名,唯一');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('简略标题');
            $table->string('page_image')->comment('标签图片');
            $table->string('meta_description')->comment('标签简介');
            $table->string('layout')->default('blog.layouts.index')->comment('标签样式,默认样式为blog.layouts.index');
            $table->boolean('reverse_direction')->comment('在文章列表按时间升序排序,默认降序');
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
        Schema::dropIfExists('tags');
    }
}
