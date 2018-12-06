<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterPortfolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table for portfolio
        Schema::create('master_portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->text('project_desc')->nullable();
            $table->text('cover_image')->nullable();
            $table->string('project_type')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('client')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('users')) {
            Schema::table('master_portfolios', function (Blueprint $table) {
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
        if (Schema::hasTable('client_logos')) {
            Schema::table('client_logos', function (Blueprint $table) {
                $table->dropForeign('masterportfolios_id');
            });
        }
        if (Schema::hasTable('users')) {
            Schema::table('master_portfolios', function (Blueprint $table) {
                $table->dropForeign('user_id');
            });
        }
        Schema::dropIfExists('master_portfolios');
    }
}
