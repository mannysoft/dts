<?php 
class Office extends BaseModel {

	//public static $timestamps = true;
	public function user()
    {
		  return $this->hasMany('User');
    }
}