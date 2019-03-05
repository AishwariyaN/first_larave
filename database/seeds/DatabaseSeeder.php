<?php

use Illuminate\Database\Seeder;
use App\school_details;

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
  

    	$check1=school_details::where('email','seedtest@gmail.com')->exists();

        if (! $check1) {

         DB::table('school_details')->insert([
            'first_name' => 'seedtest',
            'last_name' => 'seedtest',
            'email' => 'seedtest'.'@gmail.com',
            'school_name'=>'test',
            'school_rating'=>'3',
        ]);
     }

    }
}
