<?php 
class Office extends Eloquent {

	//public static $timestamps = true;
	public function user()
    {
		  return $this->has_many('User');
    }
}