<?php

use App\Publisher;
use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher = null;

        $publisher = ['S & H Publishing','Moody Publishers','IBJ Book Publishing','Draft2Digital'
                        ,'NOOK Press','Abbott Press','Mindstir Media','SelfPublishing.com','Book Venture Publishing LLC'
                        ,'BRIO','Writers Club Press','Pleasant Word','Crossbooks','Booktango'
                        ,'Publishing Designs','Vantage Press','Cold Tree Press','Amazon','Telemachus Press'
                        ,'Wordclay','LuLu','Morris Publishing','AuthorHouse ','JADA Press','Word Association','InstantPublisher'
                        ,'Innovo Publishing','PublishAmerica','CreateSpace Independent Publishing Platform','Raiders and Rebels Press','Arcadia Publishing'
                        ,'BenBella Books','Pelican Publishing Company, Inc.','Leonine Publishers','CCB Publishing','Total Publishing And Media'
                        ,'BookLogix','Oceanview Publishing','1st Book Library','Dramatists Play Service, Inc.','Self Published'
                        ,'Next Century Publishing','Mindstir Media','Epigraph Publishing','Professional Press','FastPencil, Inc.','Telemachus Press'
                        ,'Mira Digital Publishing','Bouje Publishing; 1 edition','Black Rose Writing','PublishAmerica'];
    
        foreach($publisher as $p){
            Publisher::create(['name'=>$p]);
        }
    }
}
