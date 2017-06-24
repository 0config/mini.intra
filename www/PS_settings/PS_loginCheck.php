<?php

@ session_start();
if (isset($_SESSION['PS_session_userName'])) {
    $PS_session_userName = $_SESSION['PS_session_userName'];
} else {
    $PS_session_userName = '0';
}
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
} else {
    $uid = '0';
}
?>
<?php

/*@ session_start();
if (isset($_SESSION['PS_session_userName'])) {
    $PS_session_userName = $_SESSION['PS_session_userName'];
} else {
    $PS_session_userName = '0';
}
if (isset($_SESSION['PS_session_uid'])) {
    $PS_session_uid = $_SESSION['PS_session_uid'];
} else {
    $PS_session_uid = '0';
}*/
?>
