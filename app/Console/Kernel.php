<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Campaign;
use App\Models\CampaignMetric;

class Kernel extends ConsoleKernel
{
		/**
		 * The Artisan commands provided by your application.
		 *
		 * @var array
		 */
		protected $commands = [
				//
		];

		/**
		 * Define the application's command schedule.
		 *
		 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
		 * @return void
		 */
		protected function schedule(Schedule $schedule)
		{	
			
				$schedule->call(function () {
					$today = date('Y-m-d H:i:s');
						$campaigns= Campaign::get();
						foreach ($campaigns as $camp) {
								if($camp->end_date<($today)){
									$camp->state='inactive';
								}
								else if($camp->start_date <=($today)){
									$camp->state='active';
								}
								else{
									$camp->state='draft';
								}
								
							$camp->save();
						}
						
				})->daily();
		}

		/**
		 * Register the commands for the application.
		 *
		 * @return void
		 */
		protected function commands()
		{
				$this->load(__DIR__.'/Commands');

				require base_path('routes/console.php');
		}
}
