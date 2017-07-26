
<div class="col-lg-10">
			<ol class="breadcrumb">
					<li>新闻管理</li>
					<li>修改新闻</li>
			</ol>

	<form action="?a=news_edit" method="post" class="add_form" enctype="multipart/form-data">
			<a href="javascript:history.back(1)" class="btn btn-default">返回</a>
			<div class="form-group">
				<label >新闻标题</label>
				<input type="text" name="news_title" value="<?php echo $arr['news_title']; ?>" class="form-control">
			</div>
			<div class="form-group">
				<label >新闻类型</label>
				<select name="news_cate">
					<option>请选择分类</option>
					<option value="2017" <?php echo $arr['news_cate']="2017"?'selected':'' ?> >2017</option>
					<option value="2016"  <?php echo $arr['news_cate']="2016"?'selected':'' ?>>2016</option>
					<option value="2015"  <?php echo $arr['news_cate']="2015"?'selected':'' ?>>2015</option>
				</select>
			</div>

			<div class="form-group">
				<label >缩略图</label>
				<input type="hidden" name="thumb" value="<?php echo $arr['thumb'];?>">
				<input type="file" name="thumb" class="dropify" data-default-file="<?php echo $arr['thumb'];?>">
				 
			</div>
			<div class="form-group">
				<label >新闻内容</label>
				<textarea name="news_content" rows="10" cols="20" id='news_content'><?php echo $arr['news_content']; ?></textarea>
				 
			</div>
			<div class="form-group">
				 
				<input type="hidden" name='id' value="<?php echo  $arr['id']; ?>" >
				 
			</div>
			<div class="form-group">
				 
				<input type="submit" class="btn btn-success"  value="修改">
				 
			</div>
	</form>
</div>


<?
include ROOT_PATH."/Views/footer.php";

?>

<link rel="stylesheet" type="text/css" href="public/lib/dropify/dropify.min.css">
<script type="text/javascript" src="public/lib/dropify/dropify.min.js"></script>


<!--百度编辑器-->
<script type="text/javascript" src="public/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="public/lib/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();
	var ue=UE.getEditor('news_content');
</script>
