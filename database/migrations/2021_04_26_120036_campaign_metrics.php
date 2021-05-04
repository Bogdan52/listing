<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CampaignMetrics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
       Schema::create('campaign_metrics', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('click')->nullable();
      $table->integer('views')->nullable();
      $table->double('spent')->nullable();
      $table->date('date')->nullable();
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
        Schema::drop('campaign_metric');
    }
}
