<?php
/**
* this is no more required.. only test 
 */

$arrCond = [
    'a' => ['=' => 'value'],
    'b' => ['!=' => 'value'],
    'c' => ['>' => 'value'],
    'd' => ['<' => 'value'],
];
$whereField = '';
$whereSQL = " WHERE  ";
if (count($arrCond) > 0) {
    foreach ($arrCond as $key => $arrSingle) {
        $whereSQL .= "  $key    " . key($arrSingle) . " '" . $arrSingle[key($arrSingle)] . "' " . " AND ";


    }

} else {
    $whereSQL = "  ";
}
$whereSQL = trim($whereSQL);
$whereSQL = trim($whereSQL, 'AND');


echo $whereSQL;
//var_dump($whereSQL);


//var_dump($arrCond);
