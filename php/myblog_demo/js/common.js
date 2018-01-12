
function login_and_do(callback)
{
	//check login
	ajax_post('/action/user/check_login','',function(msg){
		if(msg=="1"){
			var rtn = callback(null);
			if(typeof(rtn)=='string'){
				var a = $("body").add("<a class='thickbox' href='"+rtn+"' title=''></a>'").get(1);
				tb_init(a);
	    		$(a).click();
			}
		}
		else{
			if(callback)
				tb_setcallback(callback);
			else
				tb_setcallback(function(msg){
					location.reload();
				});
			tb_show('','/widgets/login?width=600&modal=true',false);
		}
	});
}

function login_and_go(url)
{
	login_and_do(function(){
		location.href = url;
	});
}

function remove_id(elem_id){
	$('#' + elem_id).remove();
}

function slide_up(elem_id){
	$('#' + elem_id).slideUp();
}

function toggle(elem_id){
	$('#' + elem_id).toggle();
}

function sendmsg(uid) {
	login_and_do(function(){
		return "/widgets/sendmsg?modal=true&to="+uid;
	});
}

/**
 * 使用ajax提交数据
 */
function ajax_post(the_url,the_param,succ_callback){
	$.ajax({
		type:'POST',
		url:the_url,
		data:the_param,
		success:succ_callback,
		error:function(html){
			alert("提交数据失败，代码:" +html.status+ "，请稍候再试");
		}
	});
}

function ajax_call(the_url,the_param){
	$.ajax({
		type:'POST',
		url:the_url,
		data:the_param,
		success:function(html){alert(html);},
		error:function(html){
			alert("提交数据失败，代码:" +html.status+ "，请稍候再试");
		}
	});
}

function ajax_call_and_refresh(the_url, the_param){
	$.ajax({
		type:'POST',
		url:the_url,
		data:the_param,
		success:function(html){location.reload();},
		error:function(html){
			alert("提交数据失败，代码:" +html.status+ "，请稍候再试");
		}
	});
}

function click_ad(ad_id){
	ajax_post('/action/visit/ad?id='+ad_id,'',function(html){});
	return true;
}

function toggle_editor(ctl,id){
	if(!tinyMCE.getInstanceById(id)){
		tinyMCE.execCommand("mceAddControl", false, id);
		if(ctl)
			ctl.innerHTML = '切换到HTML编辑';
	}
	else{
		tinyMCE.execCommand("mceRemoveControl", false, id);
		if(ctl)
			ctl.innerHTML = '切换到可视化编辑';
	}
}
function bookmark(title,url){
	if( document.all ) {
		window.external.AddFavorite( url, title);
	} 
	else if (window.sidebar) {
		window.sidebar.addPanel(title, url,"");
	} 
	else if(window.opera && window.print) {
		return true;
	}
}
function ltrim(str){
    var whitespace = new String(" \t\n\r");
    var s = new String(str);
    if (whitespace.indexOf(s.charAt(0)) != -1){
        var j=0, i = s.length;
        while (j < i && whitespace.indexOf(s.charAt(j)) != -1){
            j++;
        }
        s = s.substring(j, i);
    }
    return s;
}

function rtrim(str){
    var whitespace = new String(" \t\n\r");
    var s = new String(str);
    if (whitespace.indexOf(s.charAt(s.length-1)) != -1){
        var i = s.length - 1;
        while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1){
            i--;
        }
        s = s.substring(0, i+1);
    }
    return s;
}
 
function trim(str){
    return rtrim(ltrim(str));
}

function is_empty(str){
    return trim(str)=="";
}

function is_int(objStr,sign,zero){
    var reg;    
    var bolzero;    
    if(trim(objStr)==""){
        return false;
    }
    else{
        objStr=objStr.toString();
    }
    
    if((sign==null)||(trim(sign)=="")){
        sign="+-";
    }
    if((zero==null)||(trim(zero)==""))
    {
        bolzero=false;
    }
    else{
        zero=zero.toString();
        if(zero=="0"){
            bolzero=true;
        }
    }

    switch(sign)

    {
        case "+-":
            reg=/(^-?|^\+?)\d+$/;            
            break;
        case "+": 
            if(!bolzero){
                reg=/^\+?[0-9]*[1-9][0-9]*$/;
            }
            else{
                reg=/^\+?[0-9]*[0-9][0-9]*$/;
            }
            break;
        case "-":
            if(!bolzero){
            	reg=/^-[0-9]*[1-9][0-9]*$/;
            }
            else{
                reg=/^-[0-9]*[0-9][0-9]*$/;
            }            
            break;
        default:
            return false;
            break;
    }

    var r=objStr.match(reg);
    if(r==null){
        return false;
    }
    else{
        return true;     
    }
}

function is_email(email)
{
	// a very simple email validation checking. 
	// you can add more complex email checking if it helps 
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) 
      	return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null) 
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) 
	    	return false;
      }// if
      return true;
    }
	return false;
}
function timer(func, interval){
	$.jheartbeat.set({delay: interval}, func);
}

/**
 * Heartbeat
 */
$.jheartbeat = {
    options: {delay: 10000},
	beatfunction:  function(){},
	timeoutobj:  {id: -1},

    set: function(options, onbeatfunction) {
		if (this.timeoutobj.id > -1) {
			clearTimeout(this.timeoutobj);
		}
        if (options) {
            $.extend(this.options, options);
        }
        if (onbeatfunction) {
            this.beatfunction = onbeatfunction;
        }

		this.timeoutobj.id = setTimeout("$.jheartbeat.beat();", this.options.delay);
    },

    beat: function() {
		this.timeoutobj.id = setTimeout("$.jheartbeat.beat();", this.options.delay);
        this.beatfunction();
    }
};

$.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

/**
 * Create a popupbox with the object id and html url two parameters.
 */
jQuery.popup = function(targetid,htmlUrl) {
	$(window).load(function(){
		$("#"+targetid).load(htmlUrl,function(){
			$("#"+targetid+" div[id=Popup]").css({"right":"0px","bottom":"1px","height":$("#"+targetid+" div[id=Popup]").top});
			$("#"+targetid+" div[id=Popup]").slideDown("slow");
			$("#"+targetid).find("label[id=tomin]").toggle(function(){
					$("#"+targetid+" div[id=popmsg]").slideUp("slow");
					$(this).css("background-image","url('/img/notice_max.gif')").attr("title","最大化");
				},function(){
					$("#"+targetid+" div[id=popmsg]").slideDown("slow");
					$(this).css("background-image","url('/img/notice_min.gif')").attr("title","最小化");
			});

			$("#"+targetid).find("label[id=toclose]").click(function(){
				$("#"+targetid+" div[id=Popup]").hide();
			});
		});
	}).scroll(function(){
		//var poptop = document.documentElement.scrollTop;
		//$("#"+targetid+" div[id=Popup]").css({"right":"0px","bottom":-poptop});
		$("#"+targetid+" div[id=Popup]").css({"right":"0px","bottom":0});
	}).resize(function(){
		//var poptop = document.documentElement.scrollTop;
		//$("#"+targetid+" div[id=Popup]").css({"right":"0px","bottom":-poptop});
		$("#"+targetid+" div[id=Popup]").css({"right":"0px","bottom":0});
	});
	
};


function html_encode(str)   
{   
  var s = "";   
  if (str.length == 0) return "";   
  s = str.replace(/&/g, "&amp;");   
  s = s.replace(/</g, "&lt;");   
  s = s.replace(/>/g, "&gt;");   
  //s = s.replace(/ /g, "&nbsp;");   
  s = s.replace(/\'/g, "&#39;");   
  s = s.replace(/\"/g, "&quot;");   
  //s = s.replace(/\n/g, "<br>");   
  return s;   
}   

function html_decode(str)   
{   
  var s = "";   
  if (str.length == 0) return "";   
  s = str.replace(/&amp;/g, "&");   
  s = s.replace(/&lt;/g, "<");   
  s = s.replace(/&gt;/g, ">");   
  s = s.replace(/&nbsp;/g, " ");   
  s = s.replace(/&#39;/g, "\'");   
  s = s.replace(/&quot;/g, "\"");   
  s = s.replace(/<br>/g, "\n");   
  return s;   
}