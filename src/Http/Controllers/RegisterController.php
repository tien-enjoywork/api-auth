<?php

namespace TienEnjoywork\APIAuth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\User;

class RegisterController extends Controller
{
    /**
     * Register the user.
     *
     * @param  Request  $request
     * @return json
     */
    public function __invoke(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
		
		if ($validator->fails()) { 
            return response()->json([
				'success' => false,
				'message' => $validator->errors(),
				'error_code' => 400,
				'data' => []
			], 400);            
		}
		
		$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
		$user = User::create($input); 
		
		$data['user'] =  $user;
        $data['token'] =  $user->createToken('register')->accessToken; 
		
		return response()->json([
			'success' => true,
			'message' => 'User has been registed successfully',
			'data' => $data
		], 200); 
    }
}