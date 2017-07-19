/**
 * Created by xiecheng on 2017/7/18.
 */
$(function(){
    //搜索框
    $("#inputSearch").on("focus", function(){
        if(this.value == this.defaultValue){
            this.value = "";
        }
    }).on("blur", function(){
        if(this.value == ""){
            this.value = this.defaultValue;
        }
    });

    //导航菜单
    $("#nav li").hover(function(){
        $(this).children(".jnNav").show();
    }, function(){
        $(this).children(".jnNav").hide();
    });

    //hot
    $(".promoted").append("<span class='hot'></span>");

    //轮播图

    //调整图片的层级
    var $imgs = $("#JS_imgWrap img");
    $imgs.each(function(index, elem){
        $(elem).css({
            zIndex : 5 - index
        });
    });
    //切换
    var nowIndex = 0;
    var $menus = $("#menu a");
    $menus.on("mouseover", function(){
        nowIndex = $(this).index();
        changeImg();
    });
    setInterval(function(){
        nowIndex++;
        if(nowIndex == $imgs.length){
            nowIndex = 0;
        }
        changeImg();
    }, 1000);

    function changeImg(){
        $menus.eq(nowIndex).addClass("chos").siblings().removeClass("chos");
        $imgs.eq(nowIndex).stop(false, true).fadeIn().siblings().stop(false, true).fadeOut();
    }

    //tooltip
    tooltip("#jnNoticeInfo li a");
    tooltip(".jnCatainfo a");

    //品牌活动
    $("#jnBrandTab li").on("click", function(){
        $(this).addClass("chos").siblings().removeClass("chos");
        $("#jnBrandList").animate({
            left: -$("#jnBrandList li").innerWidth() * 4 * $(this).index()
        }, 1000);
    });

});









