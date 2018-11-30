<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PortfolioDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // table for portfolio_details table
        Schema::create('portfolio_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('masterportfolios_id')->unsigned();
            $table->string('project_img');
            $table->timestamps();
        });
        if (Schema::hasTable('master_portfolios')) {
            Schema::table('portfolio_details', function (Blueprint $table) {
                $table->foreign('masterportfolios_id')
                ->references('id')
                ->on('master_portfolios')
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
        if (Schema::hasTable('portfolio_details')) {
            Schema::table('portfolio_details', function (Blueprint $table) {
                $table->dropForeign(['masterportfolios_id']);
            });
        }
        Schema::dropIfExists('portfolio_details');
    }
}
