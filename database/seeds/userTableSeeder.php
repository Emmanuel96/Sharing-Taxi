<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/03/2016
 * Time: 01:22
 */

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    public function run()
    {
        //Delete values already in database before seeding
        DB::table('users')->delete();

        $users = array(
            array(
                'firstName' => 'Emmanuel',
                'lastName' => 'Audu',
                'campus' => 'Verney',
                'studentId' => '1600428',
            )
        );

        //insert seed user into db
        DB::table('users')->insert($users);
    }
}