<?php
//use LaravelBook\Ardent\Ardent;

class BaseModel extends Eloquent{
//class BaseModel extends Ardent{	
	
	public static function shouldReceive()
	{
		$repo = get_called_class() . 'RepositoryInterface';
		$mock = Mockery::mock($repo);
		App::instance($repo, $mock);
		
		//return call_user_func_array([$mock, 'shouldReceive'], func_get_args());
	}

}