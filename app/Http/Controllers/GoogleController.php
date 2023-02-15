<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Sheets;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Sheets;

class GoogleController extends Controller
{
    public function google_authentication(){
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {

        $user = Socialite::driver('google')->user();

        $email = $user->email;
        $name  = $user->name;
        $googleId = $user->id;

        $check = User::updateOrCreate(
            ['email' => $email],
            [
                'email' => $email,
                'name'  => $name,
                'user_google_id' => $googleId,
                'password' => Hash::make($name)
            ]
        );

        
        if($check)
        {
            Auth::login($check);
            return redirect()->route('google.spreadsheet');
        }
        

                
    }
}
