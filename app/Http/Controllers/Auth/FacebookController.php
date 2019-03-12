<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;


class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
    	//dd('s');
        try {
        		$a=Socialite::driver('facebook')->user();
    	dd($a);
    

            $user = Socialite::driver('facebook')->user();

          //  dd($user);
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {

        		//$a=Socialite::driver('facebook')->user();
    	//dd($a);
    
            return redirect('auth/facebook');


        }
    }
}