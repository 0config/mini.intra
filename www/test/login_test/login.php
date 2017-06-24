<a href="?<?php echo rand(111, 333); ?>" id="">refresh</a> |

<a href="?login=<?php echo rand(111, 333); ?>&u=your_name&g=group_1" id="">
    login with &u=your_name&g=group_1</a>  |
<a href="?login=<?php echo rand(111, 333); ?>&u=your_name&g=debug,admin,user" id="">
    login - multiple groups</a>  |
<a href="?logout=<?php echo rand(111, 333); ?>" id="">logout</a> <br>
<?php
@session_start();
if (isset($_GET['login'])) {
    $u = $_SESSION['u'] = isset($_GET['u']) ? $_GET['u'] : 'default_u';
    $g = $_SESSION['g'] = isset($_GET['g']) ? $_GET['g'] : 'default_g';
    $g_arr = explode(",", $g);
    $_SESSION['u_group'] = $g_arr;
    // convert to array
    echo "setting session.. u = $u and g = $g ";
    exit;

}
if (isset($_GET['logout'])) {
    $sd = session_destroy();
    echo '<BR>session_destroy();' . $sd . '<BR>';
    exit;

}
echo '<HR>';

// setting error_reporting based on if session > u_group contains 'debug' group
$PS_session_debug = 0;
if (isset($_SESSION['u_group'])) {
    $debugCheckArr = $_SESSION['u_group'];
    $debugCheckArr_2lower = array_map('strtolower', $debugCheckArr);
    if (in_array("debug", $debugCheckArr_2lower)) {
        $PS_session_debug = 1; // found setting debug =1
        error_reporting(E_ALL); // display all errors
    }
}
echo '<HR>';
echo "<h1>$ PS_session_debug = $PS_session_debug </h1>";
echo '<HR>';
var_dump($_SESSION);
?>