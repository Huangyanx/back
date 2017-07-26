<?php

/**
* 
*/
class View
{
	
	function __construct()
	{		
	

	}

	function assign($action,$arr='',$arr_page=''){
		
		include_once ROOT_PATH.'/Views/header.php';
		include_once ROOT_PATH.'/Views/'.$action.'.php';
	}
}



?>