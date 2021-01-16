<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class TokenController extends Controller
{
    /**
     * You can receive bearer token from TokenController
     * 
     * @request
     * link: http://localhost:8000/api/token
     * method: POST
     * Content-Type: application/json
     * body:
     * { 
	 *	"email" : "email@domain.com", 
	 *	"password" : "password",
	 *	"device_name" : "device_id" 
     *  }
     * 
     * @response
     * {
     *   "token": "4|rvX886aXcpE72N1f1KAeHGLA9NAWrB8b08yyct9P"
     * }
     * 
     */

    /**
     * get User data, and return token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect'], 401);
        }
    
        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
    }
}
