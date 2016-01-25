/**
 * Created by lilichun on 2016/1/25 0025.
 */
jQuery(document).ready(function($) {
    // geopattern
    $('.geopattern').each(function(){
        $(this).geopattern($(this).data('pattern-id'));
    });

    $("#open").mouseover(function(){
        $("#search_input").fadeIn(1).animate({width:'300px',opacity:'10'});
        $("#search_input")[0].focus();
        $("#open").fadeOut(10);
    });

    $("#search_input").blur(function(){
        $("#search_input").animate({width:'toggle',opacity:'0.1'}).fadeOut(2);
        $("#open").delay(400).fadeIn(100);
    });
    $('.share-bar').share();
});