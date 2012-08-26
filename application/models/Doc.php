<?php 
class Doc extends Eloquent {

	public static $timestamps = true;
	
	public function doc_type()
    {
          return $this->has_one('Doctype');
    }
	
	public function history()
    {
          //return $this->has_one('History');// use this for one expected
		  return $this->has_many('History'); // for many
		  //return $this->has_one('History', 'my_foreign_key');
		  //if you want to use a different column name as the foreign key, 
		  //just pass it in the second parameter to the method
    }
	
	public function user()
    {
           return $this->belongs_to('User');
    }
	
	public function office()
    {
           return $this->belongs_to('Office');
    }	
}