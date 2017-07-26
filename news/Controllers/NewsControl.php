<?php

/**
* 
*/
class NewsControl extends Controller
{
	public $mysql;
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$mysql=$this->LoadModel('news');
		$this_page='news';
			
			/*分页*/
			$count=$this->model->pdo->query('SELECT * FROM news');
			$total_count= $count->rowCount();
			$arr_page=[];
			if ($_GET['page']) {
				$page=$_GET['page'];

			}else{
				$page=1;
			}
			
			$arr_page['page']=$page;
			$page_size=5;//一页5条数据
			$page_start=($page-1)*$page_size; //该页第一条数据
			$total_page=ceil($total_count/$page_size);//总页数

			$arr_page['total_page']=$total_page;
			$news=$mysql->selects("limit $page_start,$page_size");

			/*搜索*/
		if ($_GET['key']) {
			$key=$_GET['key'];
			$news=$mysql->selects("where news_title like '%$key%' ");
		}
		//print_r($arr_page);

		 $this->view->assign('index',$news,$arr_page);
	}
	function news_add(){
		$mysql=$this->LoadModel('news');

			if ($_POST['news_title']) {
			
				$news_title=$_POST['news_title'];
				$news_cate=$_POST['news_cate'];
				$news_content=$_POST['news_content'];

				$news_thumb='public/uploads/'.time().'.png';
				copy($_FILES['thumb']['tmp_name'], ROOT_PATH.'/'.$news_thumb);
				$arr=[$news_title,$news_cate,$news_content,time(),$news_thumb];

				$mysql->add("news_title,news_cate,news_content,create_time,thumb",$arr);
				
				header('location:index.php');
			}else{
				 $this->view->assign('news_add');
			}

	}

		function news_edit(){

			$mysql=$this->LoadModel('news');


				if ($_POST['news_title']) {
					
					$news_title=$_POST['news_title'];
					$news_cate=$_POST['news_cate'];
					$news_content=$_POST['news_content'];
					$id=$_POST['id'];

					if ($_FILES['thumb']) {
						$thumb='public/uploads/'.time().'.png';
						copy($_FILES['thumb']['tmp_name'], ROOT_PATH.'/'.$thumb);
						
					}else{
						$thumb=$_POST['thumb'];
					}

					$arr=array(
						"news_title"=>$news_title,
						"news_cate"=>$news_cate,
						"news_content"=>$news_content,
						"thumb"=>$thumb
						);
				
					$mysql->edit($arr,$id);
					
					header("location:index.php");
					
				}else{
					if ($_GET) {
						$id=$_GET['id'];
						$news=$mysql->select_one("where id=$id");
						$this->view->assign('news_edit',$news);
						
					}

				}

				

		}



		function delete_all(){


			$mysql=$this->LoadModel('news');
				if ($_POST) {
					$id=$_POST['ids'];
					if ($id) {

						$mysql->delect($id);
						echo json_encode( array('status'=>1,'msg'=>'删除成功'));
				
					}
					
				}else{
					$id=$_GET['id'];
					if ($id) {
						
						$mysql->delect($id);
						header("location:index.php");
						
					}
				}
		}

		function news_preview(){

				$mysql=$this->LoadModel('news');

				$id=$_GET['id'];
				$news=$mysql->select_one("where id=$id");
				
				$arr=[];

				/*浏览次数*/
				$view_count=intval($news['view_count'])+1;
				$this->model->pdo->exec("update news set view_count='$view_count' where id='$id'");
				  /*下一条新闻*/ 

				$next=$mysql->select_one("where id>$id limit 1");
				
				$arr['next']=$next;

				$hot=$mysql->selects("ORDER BY view_count DESC limit 10");

				$arr['hot']=$hot;
				
				$this->view->assign('news_preview',$news,$arr);

		}
}



?>