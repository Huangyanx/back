
<div class="col-lg-10">
			<ol class="breadcrumb">
					<li>新闻管理</li>
					<li>添加新闻</li>
			</ol>

	<form action="?a=news_add" method="post" class="add_form" enctype="multipart/form-data">
			<a href="javascript:history.back(1)" class="btn btn-default">返回</a>
			<div class="form-group">
				<label >新闻标题</label>
				<input type="text" name="news_title" class="form-control" required>
			</div>
			<div class="form-group">
				<label >新闻类型</label>
				<select name="news_cate" required>
					<option>请选择分类</option>
					<option value="2017">2017</option>
					<option value="2016">2016</option>
					<option value="2015">2015</option>
				</select>
			</div>

			<div class="form-group">
				<label >缩略图</label>
				<input type="file" name="thumb" class="dropify" required>
				 
			</div>
			<div class="form-group">
				<label >新闻内容</label>
				<textarea name="news_content" rows="10" cols="20" id='news_content' required></textarea>
				 
			</div>
			<div class="form-group">
				 
				<input type="submit" class="btn btn-success"  value="添加">
				 
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