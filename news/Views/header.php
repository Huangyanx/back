<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="public/lib/Bootstrap3.3.7/css/Bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/lib/fontasome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/common.css">

</head>
<body>
	<div >
		<div class="head-box">
			<div class="col-lg-3">
				列表
			</div>
			<div class="col-lg-3 pull-right">
				个人主页
			</div>
			
		</div>
		<div class="main">
			<div class="col-lg-2 left_menu_box">
				<ul>
					<li><a href="#goods" data-toggle="collapse">新闻管理
						<ul class="collapse <?php echo $this_page=="news"?"in":""; ?>" id="goods">
							<li><a href="index.php">新闻列表</a> </li>
							<li><a href="?a=news_add">添加新闻</a></li>
						</ul>
					</a>
					</li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					
				</ul>
			</div>

<?php

include_once "lib/function.php";

?>

