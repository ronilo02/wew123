<?php

use App\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->truncate();

        $userStatus = null;

        $userStatus = ['Active','Inactive','Deactivated'];

        foreach($userStatus as $us){
             UserStatus::create(['name'=>$us]);   
        }
    }
}
