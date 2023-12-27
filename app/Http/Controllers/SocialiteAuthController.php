<?php

namespace App\Http\Controllers;

use App\Enums\SocialiteProviders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    public function index(SocialiteProviders $provider)
    {
        return Socialite::driver($provider->value)->redirect();
    }

    public function store(SocialiteProviders $provider)
    {
        $providerUser = Socialite::driver($provider->value)->user();
        $user = User::where('email', $providerUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);
        }

        $user->authProviders()->updateOrCreate([
            'provider' => $provider->value,
        ], [
            'provider_id' => $providerUser->getId(),
            'avatar' => $providerUser->getAvatar(),
            'token' => $providerUser->token,
            'nickname' => $providerUser->getNickname(),
            'login_at' => Carbon::now(),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
