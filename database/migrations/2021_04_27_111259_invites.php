<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invites extends Migration
{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
				Schema::create('invites', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('company_id')->nullable()->unsigned();
			$table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade')->onUpdate('cascade');  
 			$table->integer('user_id')->nullable()->unsigned();
			$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');     
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
				Schema::drop('invites');
		}
}
