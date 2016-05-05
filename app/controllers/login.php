<?php

class login extends \BaseController {

	public function checkLogin(){
		$email = Input::get('email');
		$password = Input::get('password');
		try
		{
			// Login credentials
			$credentials = array(
				'email'    => $email,
				'password' => $password,
			);

			// Authenticate the user
			$user = Sentry::authenticate($credentials, false);

			return \Redirect::to('dashboard');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			echo 'User is not activated.';
		}

// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			echo 'User is banned.';
		}
	}
}
