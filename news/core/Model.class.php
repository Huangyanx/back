<?php

/**
* 
*/
class Model 
{
	public $pdo;

	function __construct()
	{

				global $conf;
				$db_driver=$conf['db_driver'];
				$host=$conf['host'];
				$db_name=$conf['db_name'];
		try{
				
				$this->pdo= new PDO("$db_driver:host=$host;dbname=$db_name;charset=utf8",$conf['user'],$conf['db_pwd']);
		        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			}catch(PDOException $e){
				echo  $e->getMessage();
			}
	}
	
}



?>