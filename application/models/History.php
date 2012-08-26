<?php 
class History extends Eloquent {

	public static $timestamps = true;
	
	public function user()
    {
		  return $this->belongs_to('User');// Belong to is the reverse of has one or
		  									// has many
											// has one uses id -> user_id
											// belong to uses user_id to id
    }
	
	public function office()
    {
		  return $this->belongs_to('Office');// office_id of history table then
		  									// id of office table
    }

}