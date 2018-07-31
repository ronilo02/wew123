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
        $userStatus = null;

        $userStatus = ['Active','Inactive'];

        foreach($userStatus as $us){
             UserStatus::create(['name'=>$us]);   
        }
    }
}
