<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Models\Device;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Kullanıcı Oluşturma
     *
     * @param [string] name
     * @param [string] email
     * @param [string] password
     * @return [string] message
     */
    public function register(RegisterPostRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['status'] = 0; // new create user status
        $user = User::create($data);
        return $this->login($request);
    }
    /**
     * Kullanıcı Girişi ve token oluşturma
     *
     * @param [string] email
     * @param [string] password
     * @return [string] token
     * @return [string] token_type
     * @return [string] expires_at
     * @return [string] success
     */
    public function login(Request $request){
        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $message['company_id'] = $user->id;
            $message['status'] = $user->status;
            $message['token_type'] = 'Bearer';
            $message['token'] = $user->createToken('Case')->accessToken;

            return response()->json($message, 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
