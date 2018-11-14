<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 * Description of Test
 *
 * @author cfyl
 */
class Sprzet extends Model
{
    //put your code here
    
    protected $table = "sprzet";
    
    
     public static function loadMainGridData(Request $request){
          
        
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
                . '(select *, row_number() over(order by '.$sortfield.' '.$sortorder.') as row from sprzet  '.$condition.')  '
                . 'as q1 where row between '.$start.' and '.$stop.') as s';
                
     
        $rowcount =  \DB::select('select count(1) as rows from sprzet '.$condition);
  
        // \App\Jqwidgetshelper::writeDataToFile($rowcount);
        
        $data[]=array(
            'TotalRows' =>$rowcount[0]->rows,
            'Rows'=>\DB::select($query)
        );
                       
        return $data;
        
    }
}