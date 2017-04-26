<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the facebook authentication page.
     *
     * @param string $provider OAuth Provider
     * @return
     */
    public function authRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @param string $provider OAuth Provider
     *
     * @return \Illuminate\View\View
     */
    public function authCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

//        dd($user, $provider);

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);

        return view('home')->with(['user' => $user]);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     *
     * @param  object $user Socialite user object
     * @param  string $provider OAuth Provider
     * @return  Model
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
