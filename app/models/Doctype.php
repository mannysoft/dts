<?php 
class Doctype extends BaseModel {
	
	protected $table = 'doc_types';
	
	public static function getDocTypes()
	{
		return self::orderBy('name')->get();
	}
	
	
	public static function dropDown()
	{
		$docs = self::getDocTypes();
		
		foreach ($docs as $doc)
		{
			$doctype_id[$doc->id] = $doc->name;
		}
		
		return $doctype_id;
	}
	
}