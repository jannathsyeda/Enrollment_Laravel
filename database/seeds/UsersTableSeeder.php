<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'role_id'  => '1',
         'name' => 'mr1',
         'username' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('rootadmin'),
        ]);


        DB::table('users')->insert([
         'role_id'  => '2',
         'name' => 'mr2',
         'username' => 'SubAdmin',
         'email' => 'subadmin@gmail.com',
         'password' => bcrypt('rootsubadmin'),
        ]);
    }
}
