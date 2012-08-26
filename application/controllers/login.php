<?php

class Login_Controller extends Base_Controller {

	public function action_index()
	{
		return Redirect::to('login/login');
	}
	
	public function action_login()
	{
		$data = array();
		$data['status'] = '';
				
		$input = Input::all();
		
		$rules = array(
			'username'  	=> 'required|max:50',
			'password'  	=> 'required|max:50',
		);
		
		$validation = Validator::make($input, $rules);
		
		$data['errors'] = array();
		
		if (Input::get('op'))
		{
			if ( $validation->fails() )
			{
				$data['errors'] = $validation->errors->all();
			}
			else
			{
				$credentials = array('username' => Input::get('username'), 'password' => Input::get('password'));
		
				if (Auth::attempt($credentials))
				{
					 return Redirect::to('document');
				}
				else
				{
					$data['errors'] = array('error' => 'Invalid Username or Password');
				}
				
			}
						
		}
		
		return View::make('auth.login', $data);
	}
	
	public function action_logout()
	{
		Auth::logout();
		return Redirect::to('auth/login');
	}

	
}