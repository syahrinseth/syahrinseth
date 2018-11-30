<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_type')->default('client');
            $table->string('user_company')->nullable();
            $table->string('user_img')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        if (Schema::hasTable('master_aboutme')) {
            Schema::table('master_aboutme', function(Blueprint $table){
                $table->dropForeign('user_id');
            });
        }
        if (Schema::hasTable('master_messages')){
            Schema::table('master_messages', function (Blueprint $table) {
                $table->dropForeign('user_id');
            });
        }
        if (Schema::hasTable('master_blogs')) {
            Schema::table('master_blogs', function (Blueprint $table) {
                $table->dropForeign('user_id');
            });
        }
        if (Schema::hasTable('master_portfolios')) {
            Schema::table('master_portfolios', function (Blueprint $table) {
                $table->dropForeign('user_id');
            });
        }
        Schema::dropIfExists('users');
    }
}
