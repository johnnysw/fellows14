requirejs.config({
    paths: {
        jquery: 'jquery-1.11.2'
    }
});
define(["jquery"], function($){
    return {
        open : function(settings){
            var defaulstSettings = {
                width: 500,
                height: 400,
                title: "弹出层",
                content: ""
            };
            $.extend(defaulstSettings, settings);
            var html =  '<div class="dialog-container">'
                + '<div class="dialog-mask"></div>'
                + '<div class="dialog-box">'
                + '<div class="dialog-title">'
                + '<div class="dialog-title-item">'+ defaulstSettings.title +'</div>'
                + '<div class="dialog-title-close">[X]</div>'
                + '</div>'
                + '<div class="dialog-content"></div>'
                + '</div>'
                + '</div>';

            $(document.body).append(html);
            $(".dialog-box").css({
                width: defaulstSettings.width,
                height: defaulstSettings.height
            });
            if(defaulstSettings.content.indexOf(".html") != -1){
                $(".dialog-content").load(defaulstSettings.content);
            }else{
                $(".dialog-content").html(defaulstSettings.content);
            }
            $(".dialog-title-close").on("click", function(){
                $(this).parents(".dialog-container").remove();
                // $(".dialog-container").remove();
            });
        }
    };
});