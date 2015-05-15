<?php
namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
	// create a user
	public function store()
	{
		$password = \Request::input('password');
		$password_confirmation = \Request::input('password_confirmation');
		$email    = \Request::input('email');

		// todo

		// $user = new \User();
		// $user->password = Hash::make($password);
		// $user->email = $email;
		// $user->save();
		// return $user;
	}
}