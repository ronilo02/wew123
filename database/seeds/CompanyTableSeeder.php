<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = null;

        $company = array("Author Codex","Bookspine0 Press","Folioavenue - US","Folioavenu - UK","Folioavenue - Australia");
    
        foreach($company as $c){
            Company::create(['name'=>$c]);
        }    
    }
}
