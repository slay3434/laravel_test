<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;


Route::get('/', function () {
    //$links = \App\Link::all();
    //$test = \App\Test::all(); 
    //$test=['id'=>'a', 'nazwa'=>'b'];   
    //return view('welcome'    , ['links' => $links, 'tests' => $test ] );

     
     if(Auth::guest()){
        return view('/auth/login');
     }
     else{
		$colors=array();
		    try{
		    $colors= Auth::user()->colors;
		    } catch (Exception $ex){}
        $links = (new \App\Link)->wasl();
        return view('welcome'    , ['links' => $links ] ,['colors'=>$colors]);
     }

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/submit', function () {
    if (Gate::allows('loggedIn')) {
        return view('submit');
    }else{
        return view('notauthorized');
    }
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    $link = tap(new \App\Link($data))->save();

    return redirect('/');
});

Route::get('testgrid', function () {
    if (Gate::allows('loggedIn')) {
        return view('testGrida');
    }else{
           //return view('notauthorized');
            return view('/auth/login');
    }
});


Route::get('/loadGrid', function (Request $request) {
    //if (Gate::allows('admin-only')) {
    return  \App\Link::gridData($request);
  //  }
   // else{
  //      return null;
  //  } 
        
});

Route::get('loaddata','ObslugaGrida@dajGrida')->name('obslugagrida');