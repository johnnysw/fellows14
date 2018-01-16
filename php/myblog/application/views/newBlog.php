<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>发表博客 Johnny的博客 - SYSIT个人博客</title>
	<base href="<?php echo site_url() ?>">

	<link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.11.2.js"></script>
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
    	<span id="AdminTitle">发表博客</span>
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
			<li class="current"><a href="welcome/new_blog">发表博客</a></li>
			<li><a href="welcome/blog_catalogs">博客设置/分类管理</a></li>
			<li><a href="welcome/blogs">文章管理</a></li>
			<li><a href="welcome/blog_comments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<div class="MainForm">
<form id="BlogForm" action="welcome/publish_blog" method="POST">
<input id="hdn_blog_id" name="draft" value="0" type="hidden">
  <table>
  <tbody><tr><td class="t">标题（必填）</td></tr>
  <tr>
	<td>
    <input name="title" id="f_title" class="TEXT" style="width: 400px;" type="text">
	存放于 
	<select name="catalog">
		<?php foreach ($types as $type){?>
	  		<option selected="selected" value="<?php echo $type->type_id?>"><?php echo $type->type_name?></option>
		<?php }?>
		</select>
	<a href="blogCatalogs.htm" onclick="return confirm('是否放弃当前编辑进入分类管理？');">分类管理»</a>
	</td>
  </tr>
  <tr><td class='t'>内容（必填） 
		<span id='save_draft_msg' style='display:none;color:#666;'></span>

  </td></tr>

  <tr>

    <td><textarea name="content" id="ta_blog_content" style="width:750px;height:300px;"></textarea></td>
  </tr>
  <tr class="option">
	<td><strong>文章类型？</strong>
    <input id="blog_type_1" name="type" value="1" onclick="switch_src(this)" checked="checked" type="radio"> <label for="blog_type_1">原创&nbsp;</label>
	<input id="blog_type_4" name="type" value="4" onclick="switch_src(this)" type="radio"> <label for="blog_type_1">转贴&nbsp;</label>
	<span id="f_origin_url" style="display:none">
		<strong>原文链接: </strong><input id="t_origin_url" name="origin_url" class="TEXT" size="50" type="text">
	</span>
	</td>
  </tr>
  <tr class="option">
	<td><strong>隐私设置？</strong>		
		<input id="privacy_1" name="privacy" value="0" checked="checked" type="radio"> <label for="privacy_1">所有人可见&nbsp;</label>
		<input id="privacy_0" name="privacy" value="1" type="radio"> <label for="privacy_0">保密（只有本人可见）</label>
		<span class="tip">设置为保密的文章，标题对任何人是可见的</span>
	</td>
  </tr>
  <tr class="option">
	<td><strong>评论设置？	</strong>	
		<input id="can_comment_1" name="deny_comment" value="0" checked="checked" type="radio"> <label for="can_comment_1">允许评论&nbsp;</label>
		<input id="can_comment_0" name="deny_comment" value="1" type="radio"> <label for="can_comment_0">禁止评论</label>
	</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr class="submit">
	<td>
	<input value=" 发 表 " class="BUTTON SUBMIT" type="submit">
	<input name="as_top" value="1" type="checkbox"> 
	设置为置顶	
    <span id="ajax_processing" style="margin-left:10px;">正在提交，请稍候...</span>
	<span id="submit_msg" style="display:none;"></span>
	</td>
  </tr>
  </tbody></table>
</form>
</div>
<script type='text/javascript' src='assets/kindeditor/kindeditor-min.js' charset='utf-8'></script>

<style>

.ke-icon-code {

	background-image: url(/img/code.gif);

	background-position: 0px 0px;

	width: 16px;

	height: 16px;

}

</style>

<script type='text/javascript'>

<!--

$(document).ready(function(){

KE.lang['code'] = "插入程序代码或脚本";

KE.plugin['code'] = {

	click : function(id) {

		KE.util.selection(id);

		var dialog = new KE.dialog({

			id : id,

			cmd : 'code',

			file : 'code/insert_code.html',

			width : 530,

			height : 300,

			title : KE.lang['code'],

			yesButton : KE.lang['yes'],

			noButton : KE.lang['no']

		});

		dialog.show();

	},

	check : function(id) {

		var dialogDoc = KE.util.getIframeDoc(KE.g[id].dialog);

		var lang = KE.$('ic_lang', dialogDoc).value;

		var source = KE.$('ic_source', dialogDoc).value;

		if(lang == ''){

			alert('编程语言必须选择');

			return false;

		}

		if(source == ''){

			alert('请输入程序代码或者脚本');

			return false;

		}

		return true;

	},

	exec : function(id) {

		KE.util.select(id);

		var iframeDoc = KE.g[id].iframeDoc;

		var dialogDoc = KE.util.getIframeDoc(KE.g[id].dialog);

		if (!this.check(id)) return false;

		var lang = KE.$('ic_lang', dialogDoc).value;

		var source = KE.$('ic_source', dialogDoc).value;

		this.insert(id, lang, source);

	},

	insert : function(id, lang,source) {

		var html = '<pre class="brush:' + lang + '; toolbar: true; auto-links: false;">';

		html += html_encode(source);

		html += '</pre>';

		KE.util.insertHtml(id, html);

		KE.layout.hide(id);

		KE.util.focus(id);

	}

};

});

//-->

</script>

<script type='text/javascript'>

<!--

$(document).ready(function(){

	KE.show({

		id : 'ta_blog_content',

		resizeMode : 1,

		shadowMode : false,

		allowPreviewEmoticons : false,

		allowUpload : true,

		syncType : 'auto',

		urlType : 'domain',

		cssPath : 'css/ke-oschina.css',

		imageUploadJson : '/action/blog/upload_img',

		items : [ 'bold', 'italic', 'underline', 'strikethrough', 'removeformat','|','textcolor', 'bgcolor',  

				 'title', 'fontname', 'fontsize',  '|', 

				 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', '|', 

				 'code', 'image', 'flash', 'emoticons', 'link', 'unlink','|','selectall','source' ,'about'

				 ]

	});

});

//-->

</script>

<script type='text/javascript'>

<!--

$(document).ready(function(){

    $('#BlogForm').ajaxForm({

		dataType: 'json',

		beforeSerialize: function($form, options) { 

			KE.sync('ta_blog_content');           

        },

        success: function(json) {

			if(json.msg){

        		$('#submit_msg').hide();

        		$('#submit_msg').html("<span class='error_msg'>"+json.msg+"</span>");

        		$('#submit_msg').show();

			}

			else if(json.id){

				location.href = "index.htm";

			}

			else if(json.draft){

				location.href = "index.htm";

			}

        }

    });

	$("#BlogForm").ajaxStart(function(){

		$('#submit_msg').hide();

		$('#ajax_processing').show();

    });

	$("#BlogForm").ajaxComplete(function(event,request, settings){

		$('#ajax_processing').hide();

    }); 

});

function save_to_draft(){

	var form = $('#BlogForm').formSerialize();

	ajax_post("/action/blog/save?save_as_draft=1",form,function(html){

		var json = eval('(' + html + ')');

		if(json.msg)

			alert(json.msg);

		else if(json.draft){

			$('#hdn_blog_id').val(json.draft);

			$('#save_draft_msg').hide();

			$('#save_draft_msg').text("已保存到草稿箱，编号为#" + json.draft);

			$('#save_draft_msg').fadeIn();

		}

	});

}

function switch_src(rd){

	if(rd.value=='4' && rd.checked){

		$('#f_origin_url').show();

		$('#t_origin_url').focus();

	}

	else

		$('#f_origin_url').hide();

}

//-->

</script></div>

	<div class='clear'></div>

</div>

<script type='text/javascript'>

<!--

$(document).ready(function() {

	$('#AdminTitle').text('发表博客');

});

$('.AutoCommitForm').ajaxForm({

    success: function(html) {	

		$('#error_msg').hide();

		if(html.length>0)

			$('#error_msg').html("<span class='error_msg'>"+html+"</span>");

		else

			$('#error_msg').html("<span class='ok_msg'>操作已成功完成</span>")

		$('#error_msg').show("fast");

    }

});

$('.AutoCommitJSONForm').ajaxForm({

	dataType: 'json',

    success: function(json) {	

		$('#error_msg').hide();

		if(json.error==0){

			if(json.msg)

				$('#error_msg').html("<span class='ok_msg'>"+json.msg+"</span>");

			else

				$('#error_msg').html("<span class='ok_msg'>操作已成功完成</span>");

		}

		else {

			if(json.msg)

				$('#error_msg').html("<span class='error_msg'>"+json.msg+"</span>");

			else

				$('#error_msg').html("<span class='error_msg'>操作已成功完成</span>");

		}

		$('#error_msg').show("fast");

    }

});

//-->

</script>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body></html>