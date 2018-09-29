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
            $table->integer('mb_id')->unsigned();
            $table->string('name')->default('visitor');
            $table->boolean('like')->default(true);
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
        //
    }
}
