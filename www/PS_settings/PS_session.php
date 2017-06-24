<?php
// setting error_reporting based on if session > u_group contains 'debug' group
$PS_session_debug = 0;
@session_start();
if (isset($_SESSION['u_group'])) {
    $debugCheckArr = $_SESSION['u_group'];
    $debugCheckArr_2lower = array_map('strtolower', $debugCheckArr);
    if (in_array("debug", $debugCheckArr_2lower)) {
        $PS_session_debug = 1; // found setting debug =1

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(-1);
        /*        ini_set('display_errors', 1);
                error_reporting(1);
                error_reporting(E_ALL); // display all errors*/
    } else {
        // you don't want to display errors on a prod environment
        // not working so far
        error_reporting(0);
        ini_set('display_errors', 0);
    }
}
?>