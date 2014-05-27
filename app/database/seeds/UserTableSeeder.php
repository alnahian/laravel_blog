<?php

class UserTableSeeder extends Seeder	{
	public function run()	{
		$user = array(
			'username' => 'aln',
			'password' => Hash::make('admin'),
			'created_at' => DB::raw('NOW()'),
			'updated_at' => DB::raw('NOW()')
		);
		DB::table('users')->insert($user);
	}
}