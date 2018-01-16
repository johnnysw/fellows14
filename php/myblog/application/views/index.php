<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>Johnny的博客 - SYSIT个人博客</title>
	<base href="<?php echo site_url()?>">
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.js"></script>
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
	<div id="portrait"><a href="user/admin_index"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong>Johnny的博客</strong>
		<div>
			<a href="#">TA的博客列表</a>&nbsp;|
			<a href="sendMsg.htm">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">

<ul>

	<?php foreach ($list as $article){?>
  <li class='Blog' id='blog_24027'>

	<h2 class='BlogAccess_true BlogTop_0'><a href="welcome/blog_detail?id=<?php echo $article->article_id?>"><?php echo $article->title?></a></h2>

	<div class='outline'>

	  <span class='time'>发表于 <?php echo $article->post_date?></span>

	  <span class='catalog'>分类: <a href="?catalog=92334"><?php echo $article->type_name?></a></span>

	  <span class='stat'>统计: 0评/<?php echo $article->clicked?>阅</span>

	  	</div>

		<div class='TextContent' id='blog_content_24027'>

			<?php echo $article->content?>

		<div class='fullcontent'><a href="welcome/blog_detail?id=<?php echo $article->article_id?>">阅读全文...</a></div>

			</div>

	  </li>

  <?php }?>
</ul>

	<?php echo $links?>

<div class="clear"></div>
	</div>
<div class="BlogMenu"><div class="catalogs SpaceModule">
  <strong>博客分类</strong>
  <ul class="LinkLine">
	  <?php foreach ($types as $type){?>
    	<li><a href="#"><?php echo $type->type_name.'('.$type->num.')'?></a></li>
		<?php }?>
	  </ul>
</div>
<div class="comments SpaceModule">
  <strong>最新网友评论</strong>
    	<p class="NoData">目前还没有任何评论</p>
  </div></div>
<div class="clear"></div>
<script type="text/javascript" src="assets/js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
<link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css"></div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body></html>