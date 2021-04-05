<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('campaigns_data', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('click')->nullable();
      $table->integer('views')->nullable();
      $table->double('buget');
      $table->double('spent')->nullable();
      $table->integer('campaign_id')->nullable()->unsigned();
      $table->foreign('campaign_id')->references('campaign_id')->on('campaigns')->onDelete('cascade')->onUpdate('cascade');
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
      Schema::drop('campaigns_data');
    }
}
