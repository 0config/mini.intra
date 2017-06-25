<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php');


$arrCond = [
    'id' => ['>' => '1'],
    'source' => ['=' => 'bbc-sport'],

];

 $a =  PS_cl_static::make_dropDown_arrCond('main_news', 'id', 'title', '1', $arrCond, '1');
?>

<select name="" id="">
    <option value=""> Please select.. </option>
 <?php echo $a ?>
</select>
