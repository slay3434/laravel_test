<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    
    public function wasl(){
        $a = "http://wp.pl";
        $b = "def";
        $c = "ghi";

        $ln= new Link();
        $ln->url=$a;
        $ln->title=$b;
        $ln->id=111;
        $ln->created_at='2018-01-01';
        $ln->updated_at ='2018-01-01';
        //$ln->description='sdf';
        
        //$links = array();  
             $links= json_decode(Link::all());
             
        $users = \DB::table('links')->find(2);
                //\DB::select('select top 1 * from links');
        echo json_encode($users);
 
            // echo $links;
        array_push($links,$ln,
                (object) array('url'=>'http://www.wp.pl', 'title'=>'wirtualna polska'),
                (object) array('url'=>'google.pl', 'title'=>'GooGle')
                );
        //echo json_encode($links);
            //(object) array('url'=>'www.wp.pl', 'title'=>'wirtualna polska'));
            //object) array('url'=>'google.pl', 'title'=>'GooGle'));
        
        return $links;
        //return json_encode($links);
       // return $links;
        
        //return Link::all();
    }
}
