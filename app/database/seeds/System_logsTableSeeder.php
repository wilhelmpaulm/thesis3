<?php

class System_logsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('system_logs')->truncate();

//		$appointment_recipients = array(
//
////			["case_id" => , "appointment_id" => , "user_id" => ],
//
//		);

		// Uncomment the below to run the seeder
//		 DB::table('system_logs')->insert($appointment_recipients);
	}

}
