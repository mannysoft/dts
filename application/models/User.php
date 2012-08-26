<?php 
class User extends Eloquent {

	//public static $timestamps = true;
	public function doc()
    {
          //return $this->has_one('History');// use this for one expected
		  return $this->has_many('Doc'); // for many
		  //return $this->has_one('History', 'my_foreign_key');
		  //if you want to use a different column name as the foreign key, 
		  //just pass it in the second parameter to the method
    }
	
}