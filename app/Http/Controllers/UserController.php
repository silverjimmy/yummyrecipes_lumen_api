<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register(Request $request)
    {
        $this->validate(
            $request, [
                'name' => 'required|string|min: 5|max: 10',
                'email' =>'required|string|email',
                'password' => 'required'
            ]);

            $user = User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => app('hash')->make($request->password)
            ]);

        return response($user, 201);
    }

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(! is_null($user) && Hash::check($request->password, $user->password)) {
            return response(['token'=>$user->createToken('token')->accessToken], 200);
        }
        //-> memeber sector
        //=> fat arrow:for associative arrays

        return response(['message'=>'invalid credentaials'], 403);
    }

    //
}
