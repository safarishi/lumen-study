<?php
namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
	// create a user
	public function store()
	{
		$password              = \Request::input('password');
		$password_confirmation = \Request::input('password_confirmation');
		$email                 = \Request::input('email');
		$validator = \Validator::make(
		    ['email' => $email],
		    ['email' => ['required']]
		);
		if ($validator->fails())
		{
		    $messages = $validator->messages();
		    var_dump($messages);
		}

		echo '<br />store<br />';

		// todo

		// $user = new \User();
		// $user->password = Hash::make($password);
		// $user->email = $email;
		// $user->save();
		// return $user;
	}
}