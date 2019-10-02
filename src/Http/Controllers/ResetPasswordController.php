<?php

namespace TienEnjoywork\APIAuth\Http\Controllers;

use TienEnjoywork\APIAuth\Notifications\PasswordResetSuccess;
use TienEnjoywork\APIAuth\Models\PasswordReset;
use Illuminate\Http\Request;
use Validator;
use App\User;

class ResetPasswordController extends Controller
{	
    /**
     * Reseet password for the user.
     *
     * @param  Request  $request
     * @return json
     */
	public function __invoke(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => ['required', 'string'],
        ]);
		
		if ($validator->fails()) { 
            return response()->json([
				'success' => false,
				'message' => $validator->errors(),
				'error_code' => 400,
				'data' => []
			], 400);
		}

		$passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
		])->first();
		
        if (!$passwordReset) {

			return response()->json([
				'success' => false,
				'message' => 'This password reset token is invalid',
				'error_code' => 404,
				'data' => []
			], 404);
		}

		$user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
			
			return response()->json([
				'success' => false,
				'message' => 'We can not find a user with that e-mail address.',
				'error_code' => 404,
				'data' => []
			], 404);
		}

		$user->password = bcrypt($request->password);
        $user->save();
		$passwordReset->delete();

		if (config('authentication.notify.send_success_email_reset_password')) {
			$user->notify(new PasswordResetSuccess());
		}

		return response()->json([
			'success' => true,
			'message' => 'Password has been reset successfully',
			'data' => [
				'user' => $user
			]
		], 200);
    }
}