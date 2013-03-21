<?php 
class Station extends BaseModel {

	//public static $timestamps = true;
	
	public function office()
    {
		  return $this->belongsTo('Office');
    }

	
}