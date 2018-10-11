<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog_categories table migration
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterblog_id')->unsigned();
            $table->string('category')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // alter table
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->foreign('masterportfolio_id')->references('id')->on('master_portfolio');
        });
        Schema::table('master_blog', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('blog_images', function (Blueprint $table) {
            $table->foreign('masterblog_id')->references('id')->on('master_blog');
        });
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->foreign('masterblog_id')->references('id')->on('master_blog');
        });
        Schema::table('blog_likes', function (Blueprint $table) {
            $table->foreign('masterblog_id')->references('id')->on('master_blog');
        });
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->foreign('masterblog_id')->references('id')->on('master_blog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('blog_categories');
    }
}
