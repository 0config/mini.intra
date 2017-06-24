<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php');

//$db_table = 'ps_list_select', $tblKoFieldOutput_for_selValue = 'list_r_cat', $tblKoFieldOutput_for_selLabel = 'list_r_cat', $debug = '0'
//echo PS_cl_static::make_catDropDown('ps_list_select', 'list_r_cat', 'list_r_cat', '1');

echo '<HR>';

//    public static function make_dropDown($db_table = 'ps_list_select', $tblKoFieldOutput_for_selValue = 'id', $tblKoFieldOutput_for_selLabel = 'title', $dropDownStrComp_selVal = '1', $whereField = 'list_s_cat', $whereValue = 'Nepal', $debug = '0') {

 $a =  PS_cl_static::make_dropDown('main_news', 'id', 'title', '1', 'author', 'BBC News', '1');
?>

<select name="" id="">
    <option value=""> Please select.. </option>
 <?php echo $a ?>
</select>
