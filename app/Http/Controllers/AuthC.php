<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Response;
use Hash;
use Redirect;
use App\User;
use Auth;

use Socialite;

class AuthC extends Controller
{
	public function registration(){
	    $userData = array(
	      'name'      => Request::input('name'),
	      'email'     =>  Request::input('email'),
	      'password'  =>  Request::input('password'),
	      'password_confirmation' =>  Request::input('password_confirmation'),
	    );
	    $rules = array(
	        'name'      =>  'required',
	        'email'     =>  'required|email|unique:users',
	        'password'  =>  'required|min:6|confirmed',
	    );
	    $validator = Validator::make($userData,$rules);
	    if($validator->fails())
	        return Response::json(array(
	            'fail' => true,
	            'errors' => $validator->getMessageBag()->toArray()
	        ));
	    else {
	    //save password to show to user after registration
	        //$password = $userData['password'];
	    //hash it now
	        $userData['password'] =    Hash::make($userData['password']);
	        unset($userData['password_confirmation']);
	    //save to DB user details
	      $user = User::create($userData);
	      if($user) {  
	          //return success  message
	      	Auth::loginUsingId($user->id, TRUE);

	        return Response::json(array(
	          'success' => true
	          //'email' => $userData['email'],
	          //'password'    =>  $password
	        ));

	      }
	  }
	}

	public function login(){

	}

	    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $existUser = User::where('social_id', $user->id)->where('auth_via', $provider)->first();
        if(!isset($existUser)) {

        	if($user->email) {
        		$existEmail = User::where('email', $user->email)->first();
        		if(isset($existEmail)) {
	        		Auth::loginUsingId($existEmail->id, TRUE);
	        		return redirect('../dashboard');
	        	}
        	}
        	
        	$newuser = new User;
	        $newuser->name = $user->name;
	        $newuser->email = $user->email;
	        $newuser->auth_via = $provider;
	        $newuser->social_id = $user->id;
	        $newuser->save();

	        Auth::loginUsingId($newuser->id, TRUE);
	        return redirect('../');
        }
        else {
        	Auth::loginUsingId($existUser->id, TRUE);
            return redirect('../');
        }
    }
}
