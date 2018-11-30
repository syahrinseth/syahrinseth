<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // blog_comments table migration
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterblogs_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('body');
            $table->integer('rating')->default(0);
            $table->timestamps();
        });
        if (Schema::hasTable('master_blogs')) {
            Schema::table('blog_comments', function (Blueprint $table) {
                $table->foreign('masterblogs_id')
                ->references('id')
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
        if (Schema::hasTable('blog_comments')) {
            Schema::table('blog_comments', function (Blueprint $table) {
                $table->dropForeign(['masterblogs_id']);
            });
        }
        Schema::dropIfExists('blog_comments');
    }
}
