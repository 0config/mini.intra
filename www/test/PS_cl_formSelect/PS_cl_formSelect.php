<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php');
$tableName = 'main_tbl';

$singleOrErr = PS_cl_formSelect::single_select_returnArr("SELECT * FROM $tableName where id = 1 ");

var_dump($singleOrErr);

$more = PS_cl_formSelect::select_returnArr_DEPRECATED("SELECT * FROM $tableName where id > 1 ");

var_dump($more);

?>