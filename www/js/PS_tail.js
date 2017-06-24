/**
 * Created by P on 4/4/2017.
 */

$("#mobile_menu_btn").click(function () {

    $('html, body').animate({

        scrollTop: $("#main_nav").offset().top - 80
    }, 500);
});

// for link clk
$(".ps-js-link-ref").click(function () {
    var linkWork = location.pathname;
    var linkWorkArr = linkWork.split('/');
    linkWorkArr.pop();
    var linkWorkFinal = linkWorkArr.join('/') + '/';
    console.log(linkWorkFinal);
    window.location.replace(linkWorkFinal);

});