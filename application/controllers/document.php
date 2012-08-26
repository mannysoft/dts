<?php

class Document_Controller extends Base_Controller {
	
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
				
				return Redirect::to('document/create')->with('status', 'Document has been created!');
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
	
	
	public function action_receive($doc_id = '')
	{		
		if ($doc_id != '')
		{
			$history = new History();
			$history->doc_id 	= $doc_id;
			$history->office_id = Auth::user()->office_id;;
			$history->user_id 	= Auth::user()->id;
			$history->action = 'received';
			$history->date_time = date('Y-m-d h:m:s');
			$history->save();
			return 'ok';
			
		}
		
		$data = array();
						
		return View::make('document.receive', $data);
	}
	
	public function action_info($tracking_no = '')
	{
		$data = array();
		
		$data['doc'] = Doc::where('tracking_no', '=', $tracking_no)->first();
				
		if( count($data['doc']) == 0)
		{
			return 'Tracking Number does not exists!';
		}
										
		$data['actions'] = Action::where_in('id', json_decode($data['doc']->actions_needed))->get();
				
		return View::make('document.info', $data);
	}
	
	public function action_history($tracking_no = '')
	{
		$data = array();
		
		$doc = Doc::where('tracking_no', '=', $tracking_no)->first();
		
		if( count($doc) == 0)
		{
			return '';
		}
		
		$data['histories'] = Doc::find($doc->id)->history()->order_by('date_time')->get();
				
		return View::make('document.history', $data);
	}
	
	public function action_release($doc_id = '')
	{		
		$doc_id 	= Input::get('doc_id');
		$release_to = Input::get('release_to');
		$remarks 	= Input::get('remarks');
		
		
		if ($doc_id != '')
		{
			$history = new History();
			$history->doc_id 	= $doc_id;
			$history->office_id = Auth::user()->office_id;
			$history->user_id 	= Auth::user()->id;
			$history->action 	= 'released';
			$history->date_time = date('Y-m-d h:m:s');
			$history->release_to= $release_to;
			$history->remarks 	= $remarks;
			$history->save();
			
			$doc = Doc::find($doc_id);
			$doc->remarks = $remarks;
			$doc->save();
			
			return 'ok';
			
		}
		
		$data = array();
				
		return View::make('document.receive', $data);
	}
	
	public function action_my()
	{
		$data = array();
				
		$data['histories'] = Doc::find(1)->history()->order_by('date_time')->get();
				
		return View::make('document.my', $data);
	}


}