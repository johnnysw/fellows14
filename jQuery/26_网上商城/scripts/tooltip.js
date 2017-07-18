function tooltip(selector){

    $(selector).hover(function(e){
        this.tip = $(this).attr("title")?$(this).attr("title"):$(this).html();
        if($(".tip").length == 0){
            var $tooltip = $("<div class='tip'></div>").html(this.tip);
            $tooltip.appendTo($("body"));
        }else{
            $(".tip").html(this.tip);
        }

        $(".tip").offset({
            top: e.pageY + 10,
            left: e.pageX + 10
        });

        $(this).removeAttr("title");
    }, function(){
        $(this).attr("title", this.tip);
        $(".tip").remove();
    }).on("mousemove", function(e){
        $(".tip").offset({
            top: e.pageY + 10,
            left: e.pageX + 10
        });
    });
}