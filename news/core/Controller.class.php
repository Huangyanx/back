<?php

/**
* 总控制器
*/
class Controller
{
	public $control;
	public $model;
	public $view;
	public $action;

	
	function __construct()
	{
	    $this->model=new Model();
	    $this->view=new View();
	}
	function run(){

		global $conf;

		$control=$_REQUEST['c'];

		if (empty($control)) {
			$control=$conf['default_c'];
		}
		$this->action=$_REQUEST['a'];
		if (empty($this->action)) {
			$this->action=$conf['default_a'];
		}

		$control=ucfirst($control.'Control');

		$control_path=ROOT_PATH.'/Controllers/'.$control.'.php';
		
		if (!is_file($control_path)) {
			echo "控制器不存在！";
			exit();
		}	
		include_once $control_path;

		$control_class=new $control();

		$action=&$this->action;
		$control_class->$action();
	}

	/**
	 * 加载模型
	 * @param  string $modelName 模型名称
	 * @return class            模型对象
	 */
	public function loadModel($modelName)
	{
		$model=ucfirst($modelName.'Model');
		include_once ROOT_PATH.'/models/'.$model.'.php';
		$mysql=new $model();
		
		return $mysql;
	}

	
	
}




?>