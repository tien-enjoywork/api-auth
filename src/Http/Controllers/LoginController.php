<?php

namespace TienEnjoywork\APIAuth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    /**
     * Login the user.
     *
     * @param  Request  $request
     * @return json
     */
    public function __invoke(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
		
		if ($validator->fails()) { 
            return response()->json([
				'success' => false,
				'message' => $validator->errors(),
				'error_code' => 400,
				'data' => []
			], 400);            
		}

        if (Auth::attempt([
			'email' => $request->email, 
			'password' => $request->password])
		) { 
            $user = Auth::user(); 
			$data['token'] =  $user->createToken('login')->accessToken;
			 
            return response()->json([
				'success' => true,
				'message' => 'User has been logined successfully',
				'data' => $data
			], 200); 
        } else { 

            return response()->json([
				'success' => false,
				'message' => 'Unauthorised',
				'error_code' => 401,
				'data' => []
			], 401); 
        } 
    }
}