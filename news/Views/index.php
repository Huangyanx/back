
<div class="col-lg-10">
		<ol class="breadcrumb">
			<li>新闻管理</li>
			<li>新闻分类</li>
		</ol>
		<div class="row">
			<a href="?a=news_add" class="btn btn-default">添加新闻</a>
			<form class="search" action="index.php"><input class="search_key" name="key" placeholder="请输入关键字"><input type="submit" class="btn btn-success" value="搜索"></form>
		</div>
		<p></p>
		
			<table class="table table-striped list_cont">
					<tr>
						<th><input type="checkbox" id="check_all">全选</th>
						<th>新闻id</th>
						<th width="20%">新闻标题</th>
						<th width="20%">新闻类型</th>
						<th  width="20%">创建时间</th>
						<th  width="20%">操作</th>
					</tr>
					<?php   
					if ($arr) {
						foreach ($arr as $key => $value) {
								 
					   ?>
						<tr data-id="<?php echo $value['id']?>">
						<td><input type="checkbox" class="check_id" value="<?php echo $value['id']?>"></td>
						<td><?php echo $value['id']?></td>
							<td data-toggle="ajax_edit" data-name="news_title"><?php echo $value['news_title']?></td>
							<td data-toggle="ajax_edit" data-name="news_cate"><?php echo $value['news_cate']?></td>
							<td><?php echo date('Y-m-d',$value['create_time']) ?></td>
							<td><a class="" href="?a=news_preview&id=<?php echo $value['id']?>">预览</a>&nbsp;<a class="" href="?a=news_edit&id=<?php echo $value['id']?>">修改</a>&nbsp;<a class="" href="?a=delete_all&id=<?php echo $value['id']?>" onclick='return confirm("确定删除吗？")'>删除</a></td>
						</tr>

						<?php
						}

						}
					 ?>
			</table>
			<a href="#" class="btn btn-danger" onclick="return delete_more();">删除</a>
			<div class="page_count">
					<?php 
					if ($arr_page['page']==1) {
						if ($arr_page['total_page']!=1) {
							
						?>
					
						<a href="?c=news&?a=index&page=<?php echo intval($arr_page['page'])+1; ?>">下一页|</a>
						<a href="?c=news&?a=index&page=<?php echo $arr_page['total_page']; ?>">尾页</a>
					<?php }}else if($arr_page['page']==$arr_page['total_page']) {?>
						<a href="?c=news&?a=index&page=1">首页|</a>
						<a href="?c=news&?a=index&page=<?php echo intval($arr_page['page'])-1; ?>">上一页|</a>


					<?php }else{ ?>
						<a href="?c=news&?a=index&page=1">首页|</a>
						<a href="?c=news&?a=index&page=<?php echo intval($arr_page['page'])-1; ?>">上一页|</a>
						<a href="?c=news&?a=index&page=<?php echo intval($arr_page['page'])+1; ?>">下一页|</a>
						<a href="?c=news&?a=index&page=<?php echo $arr_page['total_page']; ?>">尾页</a>
					<?php }?>
					
					<span>共有<span class="total_page"><?php echo $arr_page['total_page']; ?></span>页<input id="go_page" placeholder="请输入页数，按回车"> </span>
					<select id="select_page" onchange="self.location.href=options[selectedIndex].value">
						<option>请选择页数</option>
						<?php for ($i=$arr_page['page']; $i <=$arr_page['total_page'] && $i <=(intval($arr_pager['page'])+20); $i++) { ?>
							<option value="index.php?page=<?php echo $i; ?>"><?php echo $i; ?> </option>
						<?php } ?>	
					</select>
			</div>
		

</div>

<?php

include_once ROOT_PATH.'/Views/footer.php';

?>
<script type="text/javascript">
	/*全选 反选*/
		$('#check_all').click(function () {
			if($(this).is(':checked')){
				$('.check_id').prop('checked',true);
			
			}else{
				$('.check_id').prop('checked',false);
			}
			
		})
		/*全部删除*/
		function delete_more(){
			var de_or=confirm("确认删除吗");
			if (de_or) {
					var ids='';
					var lianjie='';
					$('.check_id').each(function  () {
						if ($(this).is(":checked")) {
							 
							 ids+=lianjie+$(this).val();
							 lianjie=' and ';
						}
					})
					//ajax请求php进行删除
					$.post('?a=delete_all',{ids},function  (rtn) {
						
						if (rtn.status==1) {
							
							$('.check_id').each(function  () {
								if ($('.check_id').prop("checked")) {
									 $(this).parent().parent().remove();
								}
							})
							
						}else{
							console.log(rtn.msg);

						}
					},"json");
			}else{
				return;
			}

		}

	/*输入框页面跳转*/
		 $(function(){  
		        $('#go_page').bind('keypress',function(event){  
		  
		            if(event.keyCode == "13")      
		  
		            {  
		            	var total_page=$('.total_page').text();
		            	var go_page=$(this).val();
		            	if (go_page>total_page||go_page<1) {
		            		alert('该页数不存在：' + go_page); 
		            		 $(this).val('');
		            		return;
		            	}
		  
		                var next_page="index?page="+go_page;
		                window.location.href = next_page;
		  
		            }  
		  
		        });
    	});  

		$('[data-toggle="ajax_edit"]').dblclick(function(){
						var data_edit=$(this).attr('data-edit');
						if (data_edit==1) {

						}else{
							$(this).attr('data-edit',1);
							var old_val=$(this).text();
							$(this).html('<input value="'+old_val+'"/>');
							$(this).find("input").focus();
							$(this).find("input").blur(function(){
								
								ajax_edit($(this).parent());
							});

							$(document).keydown(function(eve){
								if (eve.keyCode==13) {
									$('[data-toggle="ajax_edit"][data-edit="1"]').each(function  () {
										
										ajax_edit($(this));
									})

									
								}
							})
						}
						
					});


					function ajax_edit(td_obj){

						td_obj.attr('data-edit',"");
							var id=td_obj.parent().attr('data-id');
							var new_val=td_obj.children(0).val();
							var data_name=td_obj.attr('data-name');
							td_obj.html(new_val);
							$.post('ajax_data.php',{id,new_val,data_name},function(rtn){
								
								var rtn_obj=JSON.parse(rtn);

								var tip=`<div class="alert alert-success  ajax_edit" >`+rtn_obj.msg+`<a href="#" class="close" data-dismiss="alert">&times;</a></div>`;
									$('.list_cont').append(tip);
							})

					}
</script>
