<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php');

//echo PS_cl_exists::session('u', 'your_name', '');
$command = PS_cl_server::get('command');
if ($command == 'create') {
    echo $command . ' = ' . PS_cl_exists::session('a', 'apple', 'create');
} elseif ($command == 'delete') {
    echo $command . ' = ' . PS_cl_exists::session('a', 'apple', 'delete');
} elseif ($command == 'check') {
    echo $command . ' = ' . PS_cl_exists::session('a', 'apple', 'check');
}



echo '<HR>';
var_dump($_SESSION);
?>
<a href="?command=create" class=""> create </a> -
<a href="?command=delete" class=""> delete </a> -
<a href="?command=check" class=""> check </a> -