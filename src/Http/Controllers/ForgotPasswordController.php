<?php

namespace TienEnjoywork\APIAuth\Http\Controllers;

use TienEnjoywork\APIAuth\Notifications\PasswordResetRequest;
use Illuminate\Http\Request;
use Validator;
use App\User;
use TienEnjoywork\APIAuth\Models\PasswordReset;

class ForgotPasswordController extends Controller
{	
    /**
     * Send email to the user with reset password link in mail box.
     *
     * @param  Request  $request
     * @return json
     */
	public function __invoke(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'exists:users'],
        ]);
		
		if ($validator->fails()) { 
            return response()->json([
				'success' => false,
				'message' => $validator->errors(),
				'error_code' => 400,
				'data' => []
			], 400);
		}
		$user = User::where('email', $request->email)->first();

		$passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
            ]
		);

		if (config('authentication.notify.send_link_reset_password')) {
			$user->notify(
				new PasswordResetRequest($passwordReset->token)
			);
		}
			 
		return response()->json([
			'success' => true,
			'message' => 'We have e-mailed your password reset link!',
			'data' => [
				'token' => $passwordReset->token
			]
		], 200); 
    }
}