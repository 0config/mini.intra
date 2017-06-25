<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php'); ?>
<?php // your asoc array here
$tableName = 'trial_table';
$tMixed = "'single quote" . 'double " quote.. ';
$titleWithQuotes = 'hello i have "quotes", shat shall i do ? ?' . $tMixed;
$arrayInput = [
    "title" => $titleWithQuotes,
    "name" => "auth name " ,
    "email" =>  rand(11, 99) . 'you@email.com',

];


$res2 = PS_cl_insRaw::PS_ins_withResult($tableName, $arrayInput, '0');
echo 'insert id : ' .  $res2;
var_dump($arrayInput);

/*$a = new PS_cl_insRaw();
$response =  $a::PS_ins_withResult($tableName, $arrayInput, '0');
// PS_check{if_exists}, takes params : table_name, check values in assoc array
// will return 0 if no record found and will return 1 if 1 or more record/s found... !
echo '<hr>';
echo 'record inserted to ' . $tableName . ' table with lastInsertId = ' . $response;
var_dump($arrayInput);*/

?>
<hr>