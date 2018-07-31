<?php

use App\LeadStatus;
use Illuminate\Database\Seeder;

class LeadStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leadStatus = null;

        $leadStatus = ['Assigned','Auto Disconnect','Busy','Dead Lead','Disconnected'
                        ,'Do Not Call','Email Only','Hung Up','New','No Answer','Not Available'
                        ,'Not in Service','Not Interested','Prospect','Re researched','Reassigned'
                        ,'Refund','Active','Routed to FAX','Scheduled Call Back','Sold Lead','Traditional Publisher'
                        ,'Voice Mail','Wrong Number','Inaccurate Lead','Language Barrier'];
    
        
        foreach($leadStatus as $ls){
            LeadStatus::create(['name'=>$ls]);
        }                
    }
}
