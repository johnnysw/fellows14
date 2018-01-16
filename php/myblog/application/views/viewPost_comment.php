<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>测试文章2 -  Johnny的博客 - SYSIT个人博客</title>
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
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong><?php echo $article->username?>的博客</strong>
		<div>
			<a href="index.htm">TA的博客列表</a>&nbsp;|
			<a href="welcome/send_msg?id=<?php echo $article->user_id?>">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="Blog">
	

  <div class="BlogTitle">
    <h1><?php echo $article->title?></h1>
    <div class="BlogStat">
						<span class="admin">
			<a href="newBlog.htm">编辑</a>&nbsp;|&nbsp;<a href="javascript:delete_blog(24026)">删除</a>
		</span>
				发表于<?php echo $article->post_date?> ,
		已有<strong><?php echo $article->clicked?></strong>次阅读
		共<strong><a href="#comments"><?php echo count($comments)?></a></strong>个评论
		<strong>1</strong>人收藏此文章
	</div> 
  </div>
  <div class="BlogContent TextContent"><?php echo $article->content?></div>
      <div class="BlogLinks">
	<ul>
		<?php if(isset($prev)){ ?>
        	<li>上篇 <span>(1小时前)</span>：<a href="welcome/blog_detail?id=<?php echo $prev->article_id?>" class="prev"><?php echo $prev->title?></a></li>
		<?php }?>

		<?php if(isset($next)){ ?>
		<li>下篇 <span>(1小时前)</span>：<a href="welcome/blog_detail?id=<?php echo $next->article_id?>" class="prev"><?php echo $next->title?></a></li>
		<?php }?>

	</ul>
  </div>
    <div class="BlogComments">
    <h2><a name="comments" href="#postform" class="opts">发表评论»</a>共有 <?php echo count($comments)?> 条网友评论</h2>
			<ul id="BlogComments">
	<?php foreach ($comments as $comment){?>
	<li id='cmt_24027_154693_261665734'>
	<div class='portrait'>
		<a href="#"><img src="assets/images//portrait.gif" align="absmiddle" alt="sw0411" title="sw0411" class="SmallPortrait" user="154693"/></a>
	</div>
	<div class='body'>
		<div class='title'>
			<?php echo $comment->username?> 发表于 <?php echo $comment->post_date?></div>
		<div class='post'><?php echo $comment->content?></div>
		<div id='inline_reply_of_24027_154693_261665734' class='inline_reply'></div>
    </div>

	<div class='clear'></div>

</li>

	<?php }?>
			</ul>
		  </div>  
  <div class="CommentForm">
    <a name="postform"></a>
    <form id="form_comment" action="" onsubmit="return false;" method="POST">
		<input type="hidden" id='article-id' value="<?php echo $article->article_id?>">
		<textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
	  <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit"> 
	  <img id="submiting" style="display: none;" src="images/loading.gif" align="absmiddle">
	  <span id="cmt_tip">文明上网，理性发言</span>
    </form>
	<a href="#" class="more">回到顶部</a>
	<a href="#comments" class="more">回到评论列表</a>
  </div>
  </div>
<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
	<strong>最新博文</strong><ul>
    		<li><a href="#">测试文章2</a></li>
				<li><a href="#">测试文章1</a></li>
			<li class="more"><a href="index.htm">查看所有博文»</a></li>
    </ul>
</div>

</div>
<div class="clear"></div>
<script type="text/javascript" src="js/blog.htm" defer="defer"></script>
<script type="text/javascript" src="js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="css/shCore.css">
<link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">
<script type="text/javascript">

	$('#btn_comment').on('click',function(){
		var content = $('#ta_post_content').val();
		var articleId = $('#article-id').val();

		$.get('welcome/add_comment',{
			content:content,
			articleId:articleId
		},function(data){
			if(data == 'success'){
//				location.href = 'welcome/blog_detail?id='+articleId;

			$('#BlogComments').append(`

				<li id='cmt_24027_154693_261665734'>
					<div class='portrait'>
						<a href="#"><img src="assets/images//portrait.gif" align="absmiddle" alt="sw0411" title="sw0411" class="SmallPortrait" user="154693"/></a>
					</div>
					<div class='body'>
						<div class='title'>
							<?php echo $user->username?> 发表于 <?php echo date("Y-m-d h:m:s")?></div>
						<div class='post'>${content}</div>
						<div id='inline_reply_of_24027_154693_261665734' class='inline_reply'></div>
					</div>

					<div class='clear'></div>

				</li>

			`)
				$('#ta_post_content').val('');

			}
		},'text');

	});



//<!--
//function delete_blog(blog_id){
//if(!confirm("文章删除后无法恢复，请确认是否删除此篇文章？")) return;
//ajax_post("/action/blog/delete?id="+blog_id,"",function(html){
//	location.href="index.htm";
//});
//}
//-->
</script>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body></html>