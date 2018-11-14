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
 * Description of SprzetController
 *
 * @author Slay
 */
class SprzetController extends Controller {
   
    
       public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function getViewSprzet(Request $request){            
        //if (Gate::allows('admin-only')) {
        return view('sprzet/sprzet');
        //    }else{
        //           //return view('notauthorized');
        //           return view('notauthorized');
        //    }
    
    }
}
