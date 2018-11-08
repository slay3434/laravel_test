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
    $links = (new \App\Link)->wasl();
    
    $test = \App\Test::all(); 
   
    return view('welcome'    , ['links' => $links, 'tests' => $test ] );
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/submit', function () {
    return view('submit');
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
           return view('notauthorized');
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

//Route::resource('__ldajGrida', 'ObslugaGrida');

Route::get('loaddata','ObslugaGrida@dajGrida')->name('obslugagrida');