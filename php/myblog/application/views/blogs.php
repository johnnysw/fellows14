<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>博客文章管理 Johnny的博客 - SYSIT个人博客</title>
	<base href="<?php echo site_url(); ?>">
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.11.2.js"></script>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery_002.js"></script>
  <script type="text/javascript" src="assets/js/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->

	<div id="OSC_Banner">
		<div id="OSC_Slogon"><?php $user = $this->session->userdata('user');
			if(isset($user)){
				echo $user->username."'s Blog";
			}?></div>
		<div id="OSC_Channels">
			<ul>
				<li><a href="#" class="project"><?php if(isset($user)){echo $user->mood;}?></a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<!-- #EndLibraryItem -->
	<div id="OSC_Topbar">
		<div id="VisitorInfo">
			当前访客身份：
			<?php
			if(isset($user)){
				echo $user->username;
				?>
				<a href='user/logout'>退出</a>
			<?php }else{?>
				游客 [ <a href="user/login">登录</a> | <a href="user/reg">注册</a> ]
			<?php }?>
			<span id="OSC_Notification">
			<a href="inbox.htm" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
					</span>
		</div>
		<div id="SearchBar">
			<form action="Search">
				<input name="user" value="154693" type="hidden">
				<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="welcome/index_logined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">博客文章管理</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li><a href="inbox.htm">站内留言(0/1)</a></li>
			<li><a href="profile.htm">编辑个人资料</a></li>
			<li><a href="chpwd.htm">修改登录密码</a></li>
			<li><a href="userSettings.htm">网页个性设置</a></li>
		</ol>
	</li>		
</ul>
<ul>
	<li class="caption">博客管理	
		<ol>
			<li><a href="welcome/new_blog">发表博客</a></li>
			<li><a href="welcome/blog_catalogs">博客设置/分类管理</a></li>
			<li class="current"><a href="welcome/blogs">文章管理</a></li>
			<li><a href="welcome/blog_comments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<div class="MainForm BlogArticleManage">
  <h3 class="title">共有 3 篇博客，每页显示 40 个，共 1 页</h3>
    <div id="BlogOpts">
	<a href="javascript:;" onclick="select_all();">全选</a>&nbsp;|
	<a href="javascript:;" onclick="unselect_all();">取消</a>&nbsp;|
	<a href="javascript:;" onclick="select_other();">反向选择</a>&nbsp;|
	<a href="javascript:;" id="del_checked">删除选中</a>
  </div>
  <ul>
		<?php foreach ($result as $article){?>
	</li>
		<li class="row_1">
		<input name="blog" value="<?php echo $article->article_id?>" type="checkbox">
		<a href="viewPost.htm" target="_blank"><?php echo $article->title?></a>
		<small><?php echo $article->post_date?></small>
	</li>
	  <?php }?>
	  </ul>
    </div>
<script type="text/javascript">
	$('#del_checked').on('click',function(){
		var box = $(":checked");
		var ids = [];
		for(var i=0;i < box.length;i++){
			ids.push($(box[i]).val());
		}
		$.get('welcome/del_article',{
			ids:ids
		},function(data){
			if(data == 'success'){
				location.href = 'welcome/blogs';
			}
		},'text');

	});


function select_all(){
	$("input[name='blog']").prop("checked", true);
}
function unselect_all(){
	$("input[name='blog']").prop("checked", false);
}
function select_other(){
	jQuery.each($("input[name='blog']"), function(i, n){
		n.checked = !n.checked;
	}); 
}
function delete_sel(){
	var blogids = "";
	jQuery.each($("input[name='blog']"), function(i, n){
		if(n.checked){
			blogids += $(this).val()+",";
		}
	});
	if(blogids.length > 0){
		if(!confirm("确认要删除选中的文章吗？")) return ;
		ajax_post("/action/blog/batch_delete","id="+blogids,function(html){
			location.reload();
		});
	}
	else
		alert("请选择要删除的文章");
}
//-->
</script></div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
<!--
</script>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>
<script type="text/javascript">

</script>
</body></html>