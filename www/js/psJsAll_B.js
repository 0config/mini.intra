// JavaScript Document Author: Psingh -> 74644p@gmail.com
function ps_phCheck(eId, eValue) {
    //alert(eId); 
    //alert(eValue);
    //document.getElementById(eId).value ='khali';
    var ph = eValue;
    var newPh = ph.replace(/[^0-9]+/g, '');

    // replacing 1st zeros and ones
    var first_newPh = newPh.substr(0, 1);
    if ((first_newPh == 0) || (first_newPh == 1)) {
        newPh = newPh.substr(1, newPh.length);
    }

    document.getElementById(eId).value = newPh;
    //alert(newPh);
    if ((newPh.length == 10)) {

        var fPh = newPh.replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, '$1.$2.$3');
        document.getElementById(eId).value = fPh;
        document.getElementById(eId).className = "tBoxGreen";
    }
    else if (newPh.length == 0) {
        // do nothing 
    }
    else {
        document.getElementById(eId).focus();
        document.getElementById(eId).value = newPh;
        document.getElementById(eId).className = "tBoxRed";
    }
    ;
}
;
function ps_trim(eId, eValue) {
    document.getElementById(eId).value = document.getElementById(eId).value.trim();
}
;
function ps_trim_tt(eId, eValue) {
    document.getElementById(eId).value = document.getElementById(eId).value.trim();
    document.getElementById(eId).value = document.getElementById(eId).value.toTitleCase();
}
;
function PS_openBrWindow(theURL, winName, features) { //v2.0
    window.open(theURL, winName, features);
}
function PS_parentRefresh() {
    opener.location.reload();
    window.opener.focus();
    window.close();
    window.location.href = "/?";
}

function ps_urlFix(eId, eValue) {
    // alert('ps_urlFix event call');
    var urlCheck = (eValue);
    var urlCheckShort = urlCheck.substr(0, 4);
    if (urlCheckShort != 'http') {
        document.getElementById(eId).value = 'http://' + eValue.trim();
    } else {
        document.getElementById(eId).value = eValue.trim();
    }
    document.getElementById(eId).className = "tBoxGreen";
    // remove if only 'http' and set to blank
    if (document.getElementById(eId).value == 'http://') {
        document.getElementById(eId).value = '';
        document.getElementById(eId).classList.remove('tBoxGreen');
    }
}

// open popup
function PS_PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}

var http = false;
if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
}
// PS_COM 10.28.14 operational for 2nd ajax // ready state changed http.readyState == 2
function validate_PS_V2(fileName, divName) {
    http.abort();
    http.open("GET", fileName, true);
    http.onreadystatechange = function () {
        if (http.readyState == 2) {
            document.getElementById(divName).innerHTML = '<img src="/ico/ps_ld.gif" />';
        }
        else if (http.readyState == 4) {
            document.getElementById(divName).innerHTML = http.responseText;
            //alert(qFieldName);
        }
    }

    http.send(null);
}