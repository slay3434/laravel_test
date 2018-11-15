<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Post;

/**
 * Description of OprogramowanieController
 *
 * @author cfyl
 */
class OprogramowanieController extends Controller {
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function getOprogramowanieView(Request $request){            
        
        return view('oprogramowanie/oprogramowanie');    
        
    }
    
     public function getOprogramowanieData(Request $request){            
        
        $condition = " where 1=1 and kategoria>100 ".\App\Jqwidgetshelper::prepareCondition($request);
        
        $sortfield = 'id';
        $sortorder = 'asc';
        
        $start = ($request->pagenum) * $request->pagesize;
        $stop = $start+$request->pagesize;
        
          if($request->sortorder!=null){
            // $query= $query.' order by '.$request->sortdatafield.' '.$request->sortorder;
              $sortfield = $request->sortdatafield;
              $sortorder = $request->sortorder;
        }
        
//        SELECT s.id, s.nr_inw, s.lok_us, s.nazwa, s.opis, s.data_lik, s.nazwadns, s.adr_ip, s.zestaw, s.id_gr, s.num_fabr, s.inwold, s.status, s.notatka, s.data_zak, lo.lokalizacja, s.lok_out, s.stat_przek 
//		from sprzet s, lokout lo where lo.id = s.lok_out 
             
        
        $query = 'select  s.id, s.nr_inw, s.lok_us, s.nazwa, s.opis, s.data_lik, s.nazwadns, s.adr_ip, s.zestaw, s.id_gr, s.num_fabr, s.inwold, s.status, s.notatka, s.data_zak, s.lokalizacja, s.lok_out, s.stat_przek from ('
                    . 'select * from('
                        . 'select *, row_number() over(order by '.$sortfield.' '.$sortorder.'  nulls last) as row from '
                            . '(select s.*,lo.lokalizacja from sprzet s left join lokout lo on s.lok_out = lo.id '.$condition.')as q0 '
                    . ')as q1 where row between '.$start.' and '.$stop
                .') as s';
                
     
        $rowcount =  \DB::select('select count(1) as rows from sprzet '.$condition);
  
        // \App\Jqwidgetshelper::writeDataToFile($rowcount);
        
        $data[]=array(
            'TotalRows' =>$rowcount[0]->rows,
            'Rows'=>\DB::select($query)
        );
                       
        return $data;
    
    }
}
