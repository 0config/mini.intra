// note : this is a 4 part code 1: fn_setTimeOut, 2: myTimeOut() , 3: fn_step_down(), 4: window.onscroll = func
// if altered things will not work

var rand_timer = Math.round(Math.random() * 25000) + 25000; // random(25) + 25 seconds //
console.log('rand_timer = ' + rand_timer);


fn_setTimeOut = function () {
    // console.log('calling fn: fn_setTimeOut');
    myTimeOut = setTimeout(function () {
        console.log('auto_t_o:' + Math.random());
        fn_step_down();
    }, rand_timer);
};


myTimeOut = setTimeout(function () { // initial time out this is required
    console.log(' init_t_o : ' + Math.random());
    fn_step_down();
}, rand_timer);


fn_step_down = function () {
    console.log('fn step down code here');
};
$(window).scroll(function () { // this will detect the scroll and fire once scroll is stopped for X i.e. ps_scroll_pause  second
    var ps_scroll_pause = 2000;
    clearTimeout($.data(this, 'scrollTimer'));
    $.data(this, 'scrollTimer', setTimeout(function () {
        // do something
        console.log("Haven't scrolled in 2 sec!");
        clearTimeout(myTimeOut);
        fn_setTimeOut();
    }, ps_scroll_pause));
});
/*
 window.onscroll = function () {
 // adding timeout
 setTimeout(function () { // will fire out after x seconds of timeout...
 console.log('starting after x seconds..');
 clearTimeout(myTimeOut);
 fn_setTimeOut();
 }, 3000);


 };
 */


/*working
 * // note : this is a 4 part code 1: fn_setTimeOut, 2: myTimeOut() , 3: fn_step_down(), 4: window.onscroll = func
 // if altered things will not work

 var rand_timer = Math.round(Math.random() * 25000) + 25000; // random(25) + 25 seconds //
 console.log('rand_timer = ' + rand_timer);


 fn_setTimeOut = function () {
 // console.log('calling fn: fn_setTimeOut');
 myTimeOut = setTimeout(function () {
 console.log('auto_t_o:' + Math.random());
 fn_step_down();
 }, rand_timer);
 };


 myTimeOut = setTimeout(function () { // initial time out this is required
 console.log(' init_t_o : ' + Math.random());
 fn_step_down();
 }, rand_timer);


 fn_step_down = function () {
 console.log('fn step down code here');
 };
 window.onscroll = function () {
 //     console.log('mouse moved.. clearing myTimeOut');
 clearTimeout(myTimeOut);
 fn_setTimeOut();

 };
 * */