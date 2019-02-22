<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // master blog table migration
        Schema::create('master_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('title');
            $table->boolean('publish')->default(0);
            $table->text('body')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('author')->nullable();
            $table->double('total_views')->default(0);
            $table->timestamps();
        });
        if (Schema::hasTable('users')) {
            Schema::table('master_blogs', function (Blueprint $table) {
                $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('blog_categories')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                $table->dropForeign(['masterblogs_id']);
            });
        }
        if (Schema::hasTable('blog_comments')) {
            Schema::table('blog_comments', function (Blueprint $table) {
                $table->dropForeign(['masterblogs_id']);
            });
        }
        if (Schema::hasTable('blog_likes')) {
            Schema::table('blog_likes', function (Blueprint $table) {
                $table->dropForeign(['masterblogs_id']);
            });
        }
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }
        Schema::dropIfExists('master_blogs');
    }
}
