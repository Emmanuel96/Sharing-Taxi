
<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/03/2016
 * Time: 01:22
 */

use Illuminate\Database\Seeder;


class studentTableSeeder extends Seeder
{
    public function createStudent($firstName, $lastName, $campus, $studentId, $password, $confirmed)
    {

    }
    public function run()
    {
        //Delete values already in database before seeding
        DB::table('students')->delete();

        $users = array(
            array(
                'firstName' => 'Emmanuel',
                'lastName' => 'Audu',
                'campus' => 'Verney',
                'studentId' => '1600428',
                'confirmed' =>1
            ),
            array(
                'firstName' => 'Tosin',
                'lastName' => 'Lagos',
                'campus' => 'Moreton Road',
                'studentId' => 1600425,
                'confirmed' => 1,
            ),
            array(
                'firstName' => 'Ibrahim',
                'lastName' => 'Alfa',
                'compus'=> 'Moreton Road',
                'studentId' => '1600424',
                'confirmed' => 1
            )
        );

        //insert seed user into db
        DB::table('students')->insert($users);
    }
}