<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Link extends Model
{
    //
    
     protected $fillable = [
        'title',
        'url',
        'description'
    ];
    
    
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
        
     //$links = new Link();
             //$links= json_decode(Link::all()->take(10));
        $links= json_decode(Link::orderBy('id', 'desc')->take(10)->get());
             
        //$users = \DB::table('links')->find(2);
        //\DB::select('select top 1 * from links');
        //echo json_encode($users);
 
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
    
    public static function gridDataOld(Request $request){
           
        
        $condition = " where 1=1 ".\App\Jqwidgetshelper::prepareCondition($request);
        
        $sortfield = 'id';
        $sortorder = 'asc';
        
        $start = ($request->pagenum) * $request->pagesize;
        $stop = $start+$request->pagesize;
        
          if($request->sortorder!=null){
            // $query= $query.' order by '.$request->sortdatafield.' '.$request->sortorder;
              $sortfield = $request->sortdatafield;
              $sortorder = $request->sortorder;
        }
                        
        
        $query = 'select id, created_at, updated_at, title, url, description from ('
                . 'select * from'
                . '(select *, row_number() over(order by '.$sortfield.' '.$sortorder.') as row from links '.$condition.')  '
                . 'as q1 where row between '.$start.' and '.$stop.') as q2';
                
     
        $rowcount =  \DB::select('select count(1) as rows from links '.$condition);

        
        $data[]=array(
            'TotalRows' =>$rowcount[0]->rows,
            'Rows'=>\DB::select($query)
        );
        
        return $data;
        
      
  
        //return \DB::select($query);
                
        //return Link::all();
    }
    
    
     public static function gridData(Request $request){
          
        
        $condition = " where 1=1 ".\App\Jqwidgetshelper::prepareCondition($request);
        
        $sortfield = 'id';
        $sortorder = 'asc';
        
        $start = ($request->pagenum) * $request->pagesize;
        $stop = $start+$request->pagesize;
        
          if($request->sortorder!=null){
            // $query= $query.' order by '.$request->sortdatafield.' '.$request->sortorder;
              $sortfield = $request->sortdatafield;
              $sortorder = $request->sortorder;
        }
             
        
        $query = 'select s.id, s.nr_inw, s.lok_us, s.nazwa as nazwa, s.opis, s.data_lik, s.nazwadns, s.adr_ip, s.zestaw, s.num_fabr, s.id_gr, s.inwold, s.status, s.nr_pom, s.nr_etyk, s.notatka, s.data_zak, s.lok_out, s.stat_przek from ('
                . 'select * from'
                . '(select *, row_number() over(order by '.$sortfield.' '.$sortorder.') as row from sprzet '.$condition.')  '
                . 'as q1 where row between '.$start.' and '.$stop.') as s';
                
     
        $rowcount =  \DB::select('select count(1) as rows from sprzet '.$condition);
  
        // \App\Jqwidgetshelper::writeDataToFile($rowcount);
        
        $data[]=array(
            'TotalRows' =>$rowcount[0]->rows,
            'Rows'=>\DB::select($query)
        );
        
        
        
        return $data;
        
      
  
        //return \DB::select($query);
                
        //return Link::all();
    }
}
