<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data = [];

        $data = UserResource::collection($users);

        return $this->success('Información consultada correctamente', $data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function desencriptarToken(Request $request)
    {
        $token = $request->token;
        $token_desencriptado = base64_decode(urldecode($token));
        $key = env('SECRET');
        $result = str_replace($key, "", $token_desencriptado);
        $parts = explode(":", $result);
        $google_id = $parts[1];
        $token = $parts[2];
        $user = User::where('google_id', $google_id)->first();

        $data = [
            'user' => $user,
            'token' => $token
        ];

        return $this->success('Usuario ha ingresado correctamente', $data, 200);
    }

    public function logout() {
        $user = auth('sanctum')->user();
        $user->currentAccessToken()->delete();
        return $this->success('Cierre de sesión exitoso.');
    }
}
