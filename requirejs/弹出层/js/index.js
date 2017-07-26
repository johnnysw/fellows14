requirejs.config({
    paths: {
        jquery: 'jquery-1.11.2'
    }
});
require(["jquery", "dialog"], function($, Dialog){
    $("#btn").on("click", function(){
        var settings = {
            // width: 400,
            // height: 300,
            // title: "我的弹出层",
            content: "login.html"
        };
        // dialog.open(settings);

        var dialog = new Dialog(settings);
        dialog.open();
    });
});