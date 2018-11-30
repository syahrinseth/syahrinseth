<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_messages', function(Blueprint $table){
            $table->increments('id');
            $table->integer('from_userid')->unsigned()->nullable();
            $table->integer('to_userid')->unsigned()->nullable();
            $table->text('message');
            $table->string('message_image')->nullable();
            $table->timestamps();
        });

        if(Schema::hasTable('users')){
            Schema::table('master_messages', function(Blueprint $table){
                $table->foreign('from_userid')
                ->references('id')->on('users')
                ->onDelete('cascade');
                $table->foreign('to_userid')
                ->references('id')->on('users')
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
        if (Schema::hasTable('master_messages')){
            Schema::table('master_messages', function(Blueprint $table){
                $table->dropForeign(['from_userid', 'to_userid']);
            });
        }
        Schema::dropIfExists('master_messages');
    }
}
