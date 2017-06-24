(function(){
    var aClose = document.getElementsByClassName("close");
    var aCartDetail = document.getElementsByClassName("cart-detail");
    var oCartMine = document.getElementById("cart-mine");
    for(var i=0; i<aClose.length; i++){
        aClose[i].index = i;//0 1
        aClose[i].onclick = function(){
            // aCartDetail[this.index].style.display = "none";
            oCartMine.removeChild(aCartDetail[this.index]);
            for(var i=0; i<aClose.length; i++){
                aClose[i].index = i;
            }
        };
    }
})();
/*
 创建dom对象：document.createElement("div");
 删除dom对象：父元素.removeChild(子元素);
 追加元素: 父元素.appendChild(子元素);
        改变父元素的innerHTML

* */