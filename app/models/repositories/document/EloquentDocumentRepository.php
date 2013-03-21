<?php
class EloquentDocumentRepository implements DocumentRepositoryInterface{
	
	public $table = 'documents';
	
	public function all()
	{
		return Document::shouldReceive();
		return Document::all();
	}
	
	public function find($id)
	{
		
	}
	public function search($id)
	{
		
	}
	
	//public function save($id)
	//{
		
	//}
}