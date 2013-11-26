<?php

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    $users = array(
        'username' => 'baris',
        'password' => Hash::make('baris')
    );

        // $this->call('UserTableSeeder');
        DB::table('users')->insert($users);
    }

}