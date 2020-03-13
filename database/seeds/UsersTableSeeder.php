<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'barry',
                'email' => 'barry@www.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Dpo49.pvXFp25SYN6oR2wuh49YrwOx4OO03mnDLu674TcqsV.gsbm',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-16 05:09:31',
                'updated_at' => '2020-02-22 21:50:21',
            ),
            1 =>
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'harry',
                'email' => 'harry@www.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4iv.v.Wm5To.wxbc3VcAI.HJ0eqoButt8CwUJ5JEg4LkT15MLE8fe',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-20 04:50:36',
                'updated_at' => '2020-03-07 04:44:58',
            ),
            2 =>
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'jerry wonder',
                'email' => 'jerry@www.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$biK/a9BMoWmm1trFpaeSguDCLaNjAb/TqKVlOgMVb3CqPEmpSeAJ.',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-03-06 06:41:38',
                'updated_at' => '2020-03-06 09:05:12',
            ),
            3 =>
            array (
                'id' => 4,
                'role_id' => 3,
                'name' => 'friday',
                'email' => 'friday@www.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$biK/a9BMoWmm1trFpaeSguDCLaNjAb/TqKVlOgMVb3CqPEmpSeAJ.',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-03-06 06:41:38',
                'updated_at' => '2020-03-06 09:05:12',
            ),
            4 =>
            array (
                'id' => 5,
                'role_id' => 3,
                'name' => 'terry',
                'email' => 'terry@www.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$biK/a9BMoWmm1trFpaeSguDCLaNjAb/TqKVlOgMVb3CqPEmpSeAJ.',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-03-06 06:41:38',
                'updated_at' => '2020-03-06 09:05:12',
            ),
        ));


    }
}
