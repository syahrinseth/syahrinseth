<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientsLogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_logos', function(Blueprint $table){
            $table->increments('id');
            $table->integer('masterportfolios_id')->unsigned();
            $table->string('company_logo');
            $table->timestamps();
        });
        if (Schema::hasTable('master_portfolios')) {
            Schema::table('client_logos', function(Blueprint $table){
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
        if (Schema::hasTable('client_logos')) {
            Schema::table('client_logos', function(Blueprint $table){
                $table->dropForeign(['masterportfolios_id']);
            });
        }
        Schema::dropIfExists('client_logos');
    }
}
