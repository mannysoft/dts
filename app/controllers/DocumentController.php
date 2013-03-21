<?php

class DocumentController extends BaseController {
	
	protected $layout = 'template';
	
	protected $document;
	
	public function __construct(DocumentRepositoryInterface $document)
	{
		$this->document = $document;
	}
	
	function yeah()
	{
		return $this->document->all();
	}
	//public function __construct()
	//{
		//parent::__construct();
		
		//$this->filter('before', 'auth');
	//}
	
	public function index()
	{
		$data['name'] = 'aso';
		
		$this->layout->content = View::make('document.index', $data);
	}
	
	public function create()
	{
		$data = array();
		
		$data['status'] = '';
		
		$tracking_no = Input::get('tracking_no');
		
		$input = Input::all();
		
		$rules = array(
			'tracking_no'  	=> 'required|max:50',
			'title'  		=> 'required|max:50',
			'for'  			=> 'required',
			'remarks'  		=> 'required|max:50',
		);
		
		$validation = Validator::make($input, $rules);
		
		$data['errors'] = array();
		
		if (Input::get('op'))
		{
			if ( $validation->fails() )
			{
				$data['errors'] = $validation->messages()->all();
				
			}
			else
			{
				$doc = Document::saveDocument();
				
				History::saveHistory($doc);
				
				return Redirect::to('document/create')
								->with('status', 'Document has been created!');
			}
			
		}
								
		$data['actions'] = Action::all();
				
		$this->layout->content = View::make('document.create', $data);		
	}
	
	
	public function receive($doc_id = '')
	{		
		if ($doc_id != '')
		{
			// Lets get the last entry before save() the history entry
			$history_id = History::where('doc_id', '=', $doc_id)->order_by('date_time', 'DESC')->take(1)->first();

			$history = new History();
			$history->doc_id 	= $doc_id;
			$history->office_id = Auth::user()->office_id;
			$history->station_id= Auth::user()->station_id;
			$history->user_id 	= Auth::user()->id;
			$history->action 	= 'received';
			$history->date_time = $time_out = DB::raw('NOW()');
			$history->save();
			
			$history = History::find($history_id->id);
			$history->time_out = $time_out;
			$history->save();
			
			return 'ok';
			
		}
		
		$data = array();
						
		$this->layout->content = View::make('document.receive', $data);
	}
	
	public function info($tracking_no = '')
	{
		$data = array();
		
		$data['doc'] = Document::where('tracking_no', '=', $tracking_no)->first();
				
		if( count($data['doc']) == 0)
		{
			return 'Tracking Number does not exists...!';
		}
		
		// Status lets get the last history entry
		$data['history'] = History::with(array('office', 'user', 'station'))
									->where('doc_id', '=', $data['doc']->id)
									->orderBy('date_time', 'DESC')
									->take(1)
									->first();		
				
		return View::make('document.info', $data);
	}
	
	public function history($tracking_no = '')
	{
		$data = array();
		
		$doc = Document::where('tracking_no', '=', $tracking_no)->first();
		
		if( count($doc) == 0)
		{
			return '';
		}
				
		$data['histories'] = History::with(array('office', 'user', 'station'))
									->where('doc_id', '=', $doc->id)
									->orderBy('date_time')
									->get();
				
		return View::make('document.history', $data);
	}
	
	public function release($doc_id = '')
	{		
		$doc_id 	= Input::get('doc_id');
		$release_to = Input::get('release_to');
		$remarks 	= Input::get('remarks');
		
		
		if ($doc_id != '')
		{
			// Lets get the last entry before save() the history entry
			$history_id = History::where('doc_id', '=', $doc_id)->order_by('date_time', 'DESC')->take(1)->first();
			
			$history = new History();
			$history->doc_id 	= $doc_id;
			$history->office_id = Auth::user()->office_id;
			$history->station_id= Auth::user()->station_id;
			$history->user_id 	= Auth::user()->id;
			$history->action 	= 'released';
			$history->date_time = $time_out = DB::raw('NOW()');
			$history->release_to= $release_to;
			$history->remarks 	= $remarks;
			$history->save();
			
			$history = History::find($history_id->id);
			$history->time_out = $time_out;
			$history->save();

						
			return 'ok';
			
		}
		
		$data = array();
				
		return View::make('document.receive', $data);
	}
	
	public function my()
	{
		$data = array();
				
		$data['docs'] = Document::with('user')
							->where('user_id', '=', Auth::user()->id)
							->get();
				
		return View::make('document.my', $data);
	}
	
	public function edit($id)
	{
		$data = array();
				
		$doc = Document::find($id);
				
		return View::make('document.edit', compact('doc'));
	}


}