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
            $table->integer('masterblogs_id')->unsigned();
            $table->integer('mastercategories_id')->unsigned();
            $table->timestamps();
        });



        if (Schema::hasTable('master_blogs')) {
            Schema::table('blog_categories', function(Blueprint $table){
                $table->foreign('masterblogs_id')
                ->references('id')
                ->on('master_blogs')
                ->onDelete('cascade');
            });
        }
        if (Schema::hasTable('master_categories')) {
            Schema::table('blog_categories', function(Blueprint $table){
                $table->foreign('mastercategories_id')
                ->references('id')
                ->on('master_categories')
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
        if (Schema::hasTable('master_categories')) {
            Schema::table('master_categories', function (Blueprint $table) {
                $table->dropForeign(['masterblogs_id', ]);
            });
        }
        Schema::dropIfExists('blog_categories');
    }
}
