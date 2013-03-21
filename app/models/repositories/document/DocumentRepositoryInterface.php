<?php
interface DocumentRepositoryInterface{
	
	public function all();
	public function find($id);
	public function search($id);
	//public function save();
}