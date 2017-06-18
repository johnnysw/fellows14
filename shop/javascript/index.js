/**
 * Created by xiecheng on 17/6/11.
 */
(function(){//函数立即调用
    var oProduct = document.getElementById("product");
    var aAdd = oProduct.getElementsByTagName("button");
    var aSpan = oProduct.getElementsByTagName("span");
    var aPrice = [];//价格
    var aNum = oProduct.getElementsByTagName("input");//数量
    var oTotalPrice = document.getElementById("total-price");
    var oTotalNum = document.getElementById("total-num");
    var oClearCart = document.getElementById("clear-cart");
    for(var i=0; i<aSpan.length; i++){
        if(aSpan[i].className == "price"){
            aPrice.push(aSpan[i]);
        }
    }
    for(var i=0; i<aAdd.length; i++){
        aAdd[i].index = i;
        aAdd[i].onclick = function(){
            oTotalPrice.innerHTML = parseFloat(oTotalPrice.innerHTML) +  aPrice[this.index].innerHTML * aNum[this.index].value;
            oTotalNum.innerHTML = parseFloat(oTotalNum.innerHTML) + parseInt(aNum[this.index].value);
        };
    }
    oClearCart.onclick = function(){
        oTotalPrice.innerHTML = "0.00";
        oTotalNum.innerHTML = "0";
    };
})();







