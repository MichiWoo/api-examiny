<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'google_id' => $user_google->id
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'plan_id' => 1,
        'avatar' => $user_google->avatar
    ]);


    Auth::login($user);

    $role = Role::findByName('user', 'api');
    $user->assignRole($role);
    $tokenName = null;
    $tz = config('app.timezone');
    $now = Carbon::now($tz);
    $minutesToAdd = config('sanctum.expiration') * 60;
    $tokenName = 'user_auth_token' . $now->format('YmdHis');
    $token = $user->createToken($tokenName, $user->getAllPermissionsSlug()->toArray(), $now->addMinutes($minutesToAdd));
    $user->access_token = $token->plainTextToken;
    $user->sign_in_at =  $token->accessToken->created_at->format('Y-m-d H:i:s');
    $user->sign_in_expires_at =  $token->accessToken->expires_at->format('Y-m-d H:i:s');

    $url = env('APP_URL');
    $key = env('APP_KEY');
    // Generar un token único
    $token = $user_google->token;
    // Encriptar el token
    $encriptedToken = base64_encode($token);
    // Crear el enlace con el token encriptado
    $link = $url . "/dashboard/" . urlencode($encriptedToken);
    return redirect()->away($link);
});
