<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
				factory(App\Models\Company::class, 10)->create()->each(function($Co) {
						$Co->campaigns()->saveMany(
								factory(App\Models\Campaign::class, 10)->create()->each(function($c) {
									$c->campaignMetric()->saveMany(
												factory(App\Models\CampaignMetric::class, 10)->create()
									);
								})
						);
				});
		}
}
