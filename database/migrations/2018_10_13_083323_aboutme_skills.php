<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AboutmeSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutme_skills', function(Blueprint $table){
            $table->increments('id');
            $table->integer('masteraboutme_id')->unsigned();
            $table->integer('index')->unique();
            $table->string('string');
            $table->integer('rating')->default(0);
            $table->timestamps();
        });

        if (Schema::hasTable('master_aboutme')) {
            Schema::table('aboutme_skills', function(Blueprint $table){
                $table->foreign('masteraboutme_id')
                ->references('id')->on('master_aboutme')->onDelete('cascade');
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
        if (Schema::hasTable('aboutme_skills')) {
            Schema::table('aboutme_skills', function(Blueprint $table){
                $table->dropForeign('masteraboutme_id');
            });
        }
        Schema::dropIfExists('aboutme_skills');
    }
}
