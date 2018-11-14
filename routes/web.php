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

//widok pierwszej strony po zalogowaniu 
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

//widok home(status zalogowania), przyklad użycia tzw namedroute czyli uproszczonej formy routingu
Route::get('/home', 'HomeController@index')->name('home');

//widok dodawania nowego linku na pierwszej stronie
Route::get('/submit', function () {
    if (Gate::allows('loggedIn')) {
        return view('submit');
    }else{
        return view('notauthorized');
    }
});

//obsluga formularza dodawania nowego linku
Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    $link = tap(new \App\Link($data))->save();

    return redirect('/');
});


///*************** widok sprzetu
//zaladowanie danych do grida z modelu Sprzet
Route::get('/getSprzetData', function (Request $request) {
    
    //przyklad uproszczonego użycia mechanizmu gates do autoryzacji dostepu, gate jest zdefiniowany w /app/providers/AuthServiceProvider
    //gate można użyć w kontrolerze 
    if (Gate::allows('loggedIn')) {
        return  \App\Sprzet::loadMainGridData($request);
    }else{
    //      return view('notauthorized'); 
        return view('/auth/login');
    } 
        
});
//zaladowanie widoku z gridem z kontrolera SprzetController
Route::get('getSprzet','SprzetController@getViewSprzet')->name('getSprzet');



//***************** sprzet koniec