<?php

/**
* 
*/
class IndexControl extends Controller
{
	
	function __construct()
	{
		echo $this->action;
		
	}
	function index(){
	print_r(get_parent_class());
		$action=$this->action;
		echo $action;
	}
}



?>