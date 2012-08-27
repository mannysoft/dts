<?php

class Base_Controller extends Controller {

	 public $layout = 'template'; //  ad ko http://laravel.com/docs/views/templating
	
	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}