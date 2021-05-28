<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Campaigns extends Migration
{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('campaigns', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('state');
				$table->double('buget')->nullable();
				$table->date('start_date')->nullable();
				$table->date('end_date')->nullable();
				$table->string('cimage')->nullable();
				$table->integer('company_id')->nullable()->unsigned();
				$table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

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
			Schema::drop('campaigns');
		}
}
