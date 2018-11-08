<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Contracts\Auth\Authenticatable;
use App\User; 
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
      public function login(Request $request)
    {
        //\App\Jqwidgetshelper::writeDataToFile('jakas tresc');
          
         // $user = new User(["name"=>'zzz', "email"=>'zzz@zz.zz']);
         // $user->save();
          

        $user = User::find(1);
      
        //$user->field =$user->field.' lub inny  wpis';
        $user->name = request('login');
        //"id":1,"name":"cfyl","email":"cfyl@wp.pl","email_verified_at":null,"created_at":"2018-11-08 10:24:24","updated_at":"2018-11-08 10:24:24"
      
        
        \App\Jqwidgetshelper::writeDataToFile($user);
        //$user->save();
           
        //$adServer = '145.237.237.85';
        $adServer=env('LDAP_SERVER');

	$ldap = ldap_connect($adServer);
          
        //$ldaprdn = 'mf' . "\\cfyl"  ;
        //$ldaprdn = "cn=test,dc=example,dc=com";
        $ldaprdn = env('LDAP_BINDING_START').request('login').env('LDAP_BINDING_END');
  
        
	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	$bind = @ldap_bind($ldap, $ldaprdn,  request('password'));
	if (!$bind) {
		@ldap_close($ldap);		
		//return view('login', ['password']);
                return redirect()->back()->withErrors(['password'=>'Nieprawidłowy login lub hasło']);
	} 
        else{
            // \App\Jqwidgetshelper::writeDataToFile($user->email);
             
             //          $user = User::find(1);
            \Auth::login($user, false);
    //          if(request('email')=="ttt@2p.pl"){
                   return  redirect('/');
            
            //$links = (new \App\Link)->wasl();
            //return view('welcome'    , ['links' => $links ] );
        }
           
          

//         
//        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'verified' => 1])) {
//            // Authentication passed...
//            return redirect()->intended('dashboard');
//        }
//          }
    }
}
