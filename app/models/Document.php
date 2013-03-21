<?php 
class Document extends BaseModel {

	//public static $timestamps = true;
	
	public $history = '';
	
	 /**
	   * Ardent validation rules
	   */
	  public static $rules = array(
		'name' => 'required|between:4,16',
		//'email' => 'required|email',
		//'password' => 'required|alpha_num|between:4,8|confirmed',
		//'password_confirmation' => 'required|alpha_num|between:4,8',
	  );
	
	public function doc_type()
    {
          return $this->hasOne('Doctype');
    }
	
	public function history()
    {
          //return $this->has_one('History');// use this for one expected
		  return $this->hasMany('History'); // for many
		  //return $this->has_one('History', 'my_foreign_key');
		  //if you want to use a different column name as the foreign key, 
		  //just pass it in the second parameter to the method
    }
	
	public function user()
    {
           return $this->belongsTo('User');
    }
	
	public function office()
    {
           return $this->belongsTo('Office');
    }
	
	public function station()
    {
           return $this->belongsTo('Station');
    }
	
	public function doctype()
    {
          return $this->belongsTo('Doctype');
    }
	
	// http://laravel.com/docs/database/eloquent (Getter & Setter Methods)
	public function get_for()
	{
		$fors = Action::where_in('id', json_decode($this->actions_needed))->get();
		
		$actions_needed = '';
		
		foreach ($fors as $for)
		{
			$actions_needed .= $for->description .', ';
		}
		
		return $actions_needed;
	}
	
	function get_current_office()
	{
		// Status lets get the last history entry
		$history = History::with(array('office', 'station'))
									->where('doc_id', '=', $this->id)
									->order_by('date_time', 'DESC')
									->take(1)
									->first();
									
		//return $history->station->name.', '.$history->office->name;
		
		return $history;
	}
	
	
	
	public static function saveDocument()
	{
		$doc = new Document;
				
		$doc->tracking_no 		= Input::get('tracking_no');
		$doc->user_id 			= Auth::user()->id;
		$doc->office_id 		= Auth::user()->office_id;
		$doc->title 			= Input::get('title');
		$doc->doctype_id 		= Input::get('doctype_id');
		$doc->actions_needed 	= json_encode(Input::get('for'));
		$doc->remarks 			= Input::get('remarks');
		$doc->allow_track 		= Input::get('allow_track');
		$doc->save();
		
		return $doc;
	}
	
}