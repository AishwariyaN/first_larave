<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         DB::table('school_details')->insert([
            'first_name' => 'seedtest',
            'last_name' => 'seedtest',
            'email' => 'seedtest'.'@gmail.com',
            'school_name'=>'test',
        ]);
    }
}
