<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username'          => 'senioradmin',
            'email'             => 'prefect@gmail.com',
            'password'          => bcrypt('prefect'),
            'group_id'          => 1,
            'remember_token'    => str_random(10),
            "created_at"        =>  \Carbon\Carbon::now(), # \Datetime()
            "updated_at"        => \Carbon\Carbon::now(),  # \Datetime()
        ]);
        User::insert([
            'username'          => 'junioradmin',
            'email'             => 'prefect2@gmail.com',
            'password'          => bcrypt('prefect2'),
            'group_id'          => 2,
            'remember_token'    => str_random(10),
            "created_at"        =>  \Carbon\Carbon::now(), # \Datetime()
            "updated_at"        => \Carbon\Carbon::now(),  # \Datetime()
        ]);
        User::insert([
            'username'          => 'elemadmin',
            'email'             => 'prefect3@gmail.com',
            'password'          => bcrypt('prefect3'),
            'group_id'          => 3,
            'remember_token'    => str_random(10),
            "created_at"        =>  \Carbon\Carbon::now(), # \Datetime()
            "updated_at"        => \Carbon\Carbon::now(),  # \Datetime()
        ]);
    }
}
