<?php

class Admin_Controller extends Base_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->filter('before', 'auth');
	}
	
	public function action_index()
	{
		return View::make('document.index');
	}
	
	public function action_create()
	{
		$data = array();
		
		$data['status'] = '';
		
		$tracking_no = Input::get('tracking_no');
		
		$input = Input::all();
		
		$rules = array(
			'tracking_no'  	=> 'required|max:50',
			'title'  		=> 'required|max:50',
			'user_id'  		=> 'required|max:50',
			'for'  			=> 'required',
			'remarks'  		=> 'required|max:50',
			//'email' => 'required',
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
				$doc = new Doc;
				$doc->tracking_no 		= Input::get('tracking_no');
				$doc->user_id 			= Input::get('user_id');
				$doc->office_id 		= Auth::user()->office_id;
				$doc->title 			= Input::get('title');
				$doc->doc_type_id 		= Input::get('doc_type_id');
				$doc->actions_needed 	= json_encode(Input::get('for'));
				$doc->remarks 			= Input::get('remarks');
				$doc->allow_track 		= Input::get('allow_track');
				$doc->save();
				
				$history = new History;
				$history->doc_id 	= $doc->id;
				$history->office_id = Auth::user()->office_id;
				$history->user_id 	= Auth::user()->id;
				$history->action 	= 'created';
				$history->date_time = date('Y-m-d h:m:s');
				$history->save();
				
				return Redirect::to('document/create')
								->with('status', 'Document has been created!');
			}
			
		}
		
		// Insert relationship
		
		$histories = array('time_in' => 'toink', 'time_out' => 'oink');
						
		$data['actions'] = Action::all();
				
		$docs = Doctype::order_by('name')->get();
		
		foreach ($docs as $doc)
		{
			$data['doc_type_id'][$doc->id] = $doc->name;
		}
		
		return View::make('document.create', $data);
	}
		
	public function action_office()
	{
		$data = array();
				
		$data['offices'] = Office::order_by('name')
						->where('status', '=', 'active')
						->get();
				
		return View::make('admin.office', $data);
	}
	
	public function action_station()
	{
		$data = array();
				
		$data['stations'] = Station::with('office')
							->order_by('name')
							->where('status', '=', 'active')
							->get();
				
		return View::make('admin.station', $data);
	}
	
	public function action_user()
	{
		$data = array();
				
		$data['users'] = User::with(array('office', 'station'))
							->order_by('lname')
							->where('status', '=', 'active')
							->get();
				
		return View::make('admin.user', $data);
	}
	
	public function action_time()
	{
		$data = array();
				
		$data['times'] = Time::with(array('station', 'doctype'))
							->where('status', '=', 'active')
							->get();
				
		return View::make('admin.time', $data);
	}
	
	public function action_doc()
	{
		$data = array();
				
		$data['docs'] = Doctype::where('status', '=', 'active')
							->order_by('name')
							->get();
				
		return View::make('admin.doc', $data);
	}






}