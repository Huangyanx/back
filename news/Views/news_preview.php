
<div class="col-lg-10">
		<ol class="breadcrumb">
			<li>新闻管理</li>
			<li>新闻预览</li>
		</ol>
		<div class="preview">
			<div class="col-lg-9">
				<a href="javascript:history.back(1)" class="btn btn-default">返回</a><p></p>
			<h1><?php echo $arr['news_title']; ?></h1>
			<div class="tip"><span class="news_cate">新闻类型：<?php echo $arr['news_cate']; ?></span><span class="create_time">该新闻发布于 <?php echo date('Y-m-d h:i:s',$arr['create_time']); ?></span></div>
			
			<p><?php echo $arr['news_content']; ?></p>
			<div class="img_box"><img src="<?php echo $arr['thumb']?>"></div>
			<div class="next">
				<h2>下一条新闻</h2>
			<a  href="?a=news_preview&id=<?php echo $arr_page['next']['id'];?>"><?php echo  $arr_page['next']['news_title'];?></a>
				
			</div>
			</div>
			<div class="col-lg-3 hot_news">
				<h2>热门新闻</h2>
				<?php

				foreach ($arr_page['hot'] as $key => $value) {
					?>
					<a href="?a=news_preview&id=<?php echo $value['id'];?>"><?php echo $value['news_title'] ?> </a>

					<?php
				}

				?>
			</div>
			
		</div>


</div>

<?
include(ROOT_PATH.'/Views/footer.php');
?>
