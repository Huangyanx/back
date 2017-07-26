<?php

/**
* 
*/
class NewsModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function select_one($where){

		$res=$this->pdo->prepare("select * from news $where");
		$res->execute();
		if ($this->pdo->errorCode!=00000) {
				echo $this->pdo->errorInfo()['2'];
		}else{

			return $news=$res->fetch();
		}
		
	}
	function selects($where){
		
		$res=$this->pdo->prepare("select * from news $where");
		$res->execute();

		if ($this->pdo->errorCode!=00000) {
				echo $this->pdo->errorInfo()['2'];
		}else{

			return $news=$res->fetchAll();
		}
		

	}
	function delect($id){

		$res=$this->pdo->prepare("delete from news where id=$id");
		$res->execute();
		if ($this->pdo->errorCode != 00000) {
			echo $this->pdo->errorInfo()['2'];
		}

	}
	function add($fied,$arr){

		$sql=$this->pdo->prepare("insert into news ($fied) values (?,?,?,?,?)");

		for ($i=0;$i< count($arr);$i++) { 
			$sql->bindValue(($i+1),$arr[$i]);
		}
		$sql->execute();
		if ($this->pdo->errorCode!=00000) {
			echo $this->pdo->errorInfo()['2'];
		}
	}

	function edit($arr,$id){

		$sql="update news set ";
		$dou="";
		foreach ($arr as $key => $value) {
			$sql.=$dou.$key."='".$value."'";
			$dou=",";

		}
		$sql.="where id =$id";
		echo $sql;
		
		$this->pdo->exec($sql);
		if ($this->pdo->errorCode!=00000) {
			echo $this->pdo->errorInfo()['2'];
		}


	}
}




?>