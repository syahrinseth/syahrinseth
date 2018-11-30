<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog_likes table migration
        Schema::create('blog_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterblogs_id')->unsigned();
            $table->string('name')->default('visitor');
            $table->boolean('like')->default(true);
            $table->timestamps();
        });
        if (Schema::hasTable('master_blogs')) {
            Schema::table('blog_likes', function (Blueprint $table) {
                $table->foreign('masterblogs_id')->references('id')
                ->on('master_blogs')
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
        if (Schema::hasTable('blog_likes')) {
            Schema::table('blog_likes', function (Blueprint $table) {
                $table->dropForeign(['masterblogs_id']);
            });
        }
        Schema::dropIfExists('blog_likes');
    }
}
