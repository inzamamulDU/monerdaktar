function setFooterPosition(){
    var marginTop = $(window).height() - $("body").outerHeight();
    console.log($("body").outerHeight());
    console.log(marginTop);
    console.log($(window).height());
    if(marginTop > 0){
        //console.log(marginTop);
        $('footer').css('margin-top', marginTop+17);
    }
}