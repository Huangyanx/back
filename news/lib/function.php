<?php

function connect_db(){
	try{
		$pdo= new PDO('mysql:host=localhost;dbname=dongjing;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;

	}catch(PDOException $e){
		return $e->getMessage();
	}
}
	

?>