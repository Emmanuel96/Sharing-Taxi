/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/03/2016
 * Time: 01:30
 */

<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        //Delete values already in database before seeding
        DB::table('posts')->delete();

//        $posts = array(
//            array(
//                'postId'=> '1',
//                'campus' => 'Verney',
//                'destination' => 'Milon Keynes',
//                'studentId' => '1600428',
//                'dateTime' => '27th June'
//            )
//        );
//
//        //insert seed post into database
//        DB::table('posts')->insert($posts);
    }
}