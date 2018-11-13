<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Post;

class ObslugaGrida extends Controller
{
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 //   public function __invoke()
 //   {
//        if (Gate::allows('loggedIn')) {
 //           return view('testGrida');
//        }else{
//               //return view('notauthorized');
//               return view('notauthorized');
//        }
 //   }
    
     public function __construct()
    {
        $this->middleware('auth');
    }
       
    public function dajGrida(Request $request){
    
       // $this->authorize('loggedIn');
       // \App\Jqwidgetshelper::writeDataToFile("dd-".$request->user()."-dd");
//            if (Gate::allows('loggedIn')) {
//                \App\Jqwidgetshelper::writeDataToFile('przeszedl');
//             }else
//             {
//             \App\Jqwidgetshelper::writeDataToFile(' nie przeszedl');
//             }
 
  // return view('testGrida');
 
        //if (Gate::allows('admin-only')) {
        return view('testGrida');
//    }else{
//           //return view('notauthorized');
//           return view('notauthorized');
//    }
    
    }
    
    
 
    
}
