(function(){//函数立即调用
    var oSmallPic = document.getElementById("small-pic");
    var aSmallImgs = oSmallPic.getElementsByTagName("img");
    var oBigPic = document.getElementById("big-pic");
    var oBigImg = oBigPic.getElementsByTagName("img")[0];
    var oLeft = document.getElementById("left");
    var oRight = document.getElementById("right");
    var oSingle = document.getElementById("single");
    var oWrapper = oSingle.getElementsByClassName("wrapper")[0];//有兼容性问题
    var nowIndex = 0;//保存的当前显示的图片的索引
    var oDrag = document.getElementById("drag");
    var oMagnify = document.getElementById("magnify");
    var oMask = document.getElementById("mask");
    var oMagnifyImg = oMagnify.getElementsByTagName("img")[0];
    for(var i=0; i<aSmallImgs.length; i++){
        aSmallImgs[i].index = i;//自定义属性
        aSmallImgs[i].onclick = function(){
            nowIndex = this.index;
            changeImg();
        };
    }
    oLeft.onclick = oRight.onclick = function(){
        if(this === oRight){
            nowIndex++;//0 1 2 3
            if(nowIndex == aSmallImgs.length){
                nowIndex = 0;
            }
        }else{
            nowIndex--;
            if(nowIndex == -1){
                nowIndex = aSmallImgs.length - 1;
            }
        }
        changeImg();
    };

    function changeImg(){
        oBigImg.src = aSmallImgs[nowIndex].src;
        oMagnifyImg.src = aSmallImgs[nowIndex].src;
        for(var i=0; i<aSmallImgs.length; i++){
            aSmallImgs[i].className = "";
        }
        aSmallImgs[nowIndex].className = "selected";
        //小图片移动
        var left = 0;
        if(nowIndex == 0){
            //oSmallPic.style.left = 0;
            left = 0;
            //animate(oSmallPic, {
            //    left: 0
            //});
        }else{
            //oSmallPic.style.left = -(aSmallImgs[0].offsetWidth + 10) + "px";
            left = 1;
            /*animate(oSmallPic, {
                left: -(aSmallImgs[0].offsetWidth + 10)
            });*/
        }
        animate(oSmallPic, {
            left: -(aSmallImgs[0].offsetWidth + 10) * left
        });
    }

    /*
    * 小图片移动规则:
    * 下标     移动距离
    *   0       0
    *   1       1*width
    *   2       1*width
    *   3       1*width
    *
    *
    * */


    //放大镜

    oMask.onmouseover = function(){
        oDrag.style.display = "block";
        oMagnify.style.display = "block";
    };
    oMask.onmouseout = function(){
        oDrag.style.display = "none";
        oMagnify.style.display = "none";
    };
    oMask.onmousemove = function(e){
        e = e || window.event;
        // console.log(e.pageX + "," + e.pageY);
        var left = e.pageX - oWrapper.offsetLeft - oDrag.offsetWidth / 2;
        var top = e.pageY - oSingle.offsetTop - oDrag.offsetHeight / 2;
        if(left <= 0){
            left = 0;
        }
        if(top <= 0){
            top = 0;
        }
        var maxRight = oBigPic.offsetWidth - oDrag.offsetWidth;
        if(left >= maxRight){
            left = maxRight;
        }
        var maxBottom = oBigPic.offsetHeight - oDrag.offsetHeight;
        if(top >= maxBottom){
            top = maxBottom
        }
        oDrag.style.left = left + "px";
        oDrag.style.top = top + "px";


        //右边大图片移动
        var scaleX = left / maxRight;
        var scaleY = top / maxBottom;
        oMagnifyImg.style.left = -scaleX * (oMagnifyImg.offsetWidth - oMagnify.offsetWidth) + "px";
        oMagnifyImg.style.top = -scaleY * (oMagnifyImg.offsetHeight - oMagnify.offsetHeight) + "px";
    };


})();

