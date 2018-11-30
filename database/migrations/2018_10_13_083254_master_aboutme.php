<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterAboutme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_aboutme', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('job_title')->nullable();
            $table->text('description')->nullable();
            $table->string('aboutme_image')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('users')) {
            Schema::table('master_aboutme', function(Blueprint $table){
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
        if (Schema::hasTable('master_aboutme')) {
            Schema::table('master_aboutme', function(Blueprint $table){
                $table->dropForeign(['user_id']);
            });
        }
        if (Schema::hasTable('aboutme_skills')) {
            Schema::table('aboutme_skills', function(Blueprint $table){
                $table->dropForeign(['masteraboutme_id']);
            });
        }
        Schema::dropIfExists('master_aboutme');
    }
}
