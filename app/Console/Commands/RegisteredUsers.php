<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendUserCount;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing cron by sending mail to admin for count';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $count = \DB::table('users')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->count();

        $admin=DB::table('users')->where('id','1')->get();
       
        Mail::to($admin[0]->email)->send(new SendUserCount($count));
    }
}
