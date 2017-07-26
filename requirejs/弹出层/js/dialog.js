requirejs.config({
    paths: {
        jquery: 'jquery-1.11.2'
    }
});
define(["jquery"], function($){
    //弹出层类
    function Dialog(settings){
        this.defaulstSettings = {
            width: 500,
            height: 400,
            title: "弹出层",
            content: ""
        };
        $.extend(this.defaulstSettings, settings);
        this.$container = $('<div class="dialog-container"></div>');
        this.$mask = $('<div class="dialog-mask"></div>');
        this.$box = $('<div class="dialog-box"></div>');
        this.$title = $('<div class="dialog-title"></div>');
        this.$item = $('<div class="dialog-title-item"></div>');
        this.$close = $('<div class="dialog-title-close">[X]</div>');
        this.$content = $('<div class="dialog-content"></div>');
    }
    Dialog.prototype.open = function(){
        this.$container.append(this.$mask).append(this.$box).appendTo(document.body);
        this.$box.append(this.$title).append(this.$content);
        this.$title.append(this.$item).append(this.$close);
        this.$box.css({
            width: this.defaulstSettings.width,
            height: this.defaulstSettings.height
        });
        this.$item.html(this.defaulstSettings.title);
        if(this.defaulstSettings.content.indexOf(".html") != -1){
            $(this.$content).load(this.defaulstSettings.content);
        }else{
            $(this.$content).html(this.defaulstSettings.content);
        }
       this.$close.on("click", function(){
           // this.$container.remove();
            this.close();
       }.bind(this));
    };
    Dialog.prototype.close = function(){
        this.$container.remove();
    };
    return Dialog;


});