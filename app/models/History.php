<?php 
class History extends BaseModel {

	//public static $timestamps = true;
	
	public $time_process = '';
	
	public static function saveHistory($doc)
	{
		$history = new History;
		$history->doc_id 	= $doc->id;
		$history->office_id = Auth::user()->office_id;
		$history->station_id= Auth::user()->station_id;
		$history->user_id 	= Auth::user()->id;
		$history->action 	= 'created';
		$history->date_time = date('Y-m-d h:m:s');
		$history->save();
		
		return $doc;
	}
	
	public function user()
    {
		  return $this->belongsTo('User');// Belong to is the reverse of has one or
		  									// has many
											// has one uses id -> user_id
											// belong to uses user_id to id
    }
	
	public function office()
    {
		  return $this->belongsTo('Office');// office_id of history table then
		  									// id of office table
    }
	
	public function station()
    {
		  return $this->belongsTo('Station');
    }
	
	// http://laravel.com/docs/database/eloquent (Getter & Setter Methods)
	public function get_process_time()
	{
		//return  date('h:m:s', strtotime($this->time_out) - strtotime($this->date_time));
		
		if ($this->time_out != '')
		{
			//return strtotime($this->time_out) - strtotime($this->date_time);
			//return  date('d h:m:s', strtotime($this->time_out) - strtotime($this->date_time));
			
			$date1 = DateTime::createFromFormat("Y-m-d H:i:s", $this->date_time);
			$date2 = DateTime::createFromFormat("Y-m-d H:i:s", $this->time_out);
				
			// Return formatted diference (7hrs 5mins and 43 seconds)
			$process_time = $date1->diff($date2)->format('%ddays %hhrs %imins and %sseconds ');
			
			$process_time = str_replace('0days', '', $process_time);
			$process_time = str_replace('0hrs', '', $process_time);
			
			return $process_time;
		}
		
	}



}