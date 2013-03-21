<?php 
class Time extends BaseModel {

	public static $timestamps = true;
	
	public static $table = 'time_alloted';
	
	public function station()
    {
          return $this->belongsTo('Station');
    }
		
	public function doctype()
    {
          return $this->belongsTo('Doctype');
    }


	
}