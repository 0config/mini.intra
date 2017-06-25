# Filter gen: 

visit:http://dry-project.lateraljs.org/formGen/V2_filterGen.php?filters=name|email|phone|city|state|zip&condition=AND

## add:  'filter' seperated by |
## : condition : AND or OR

        <?php
        $name = isset($_GET['name'])  ? ($_GET['name']) : '' ;
        $name_SlasheD = addslashes($name);
        $name_add_SQL =  ($name != '')  ?   "  WHERE   name  = '$name_SlasheD' "  : ' ' ;
        $email = isset($_GET['email'])  ? ($_GET['email']) : '' ;
        $email_SlasheD = addslashes($email);
        $email_add_SQL =  ($email != '')  ?   " AND  email  = '$email_SlasheD' "  : ' ' ;
        $phone = isset($_GET['phone'])  ? ($_GET['phone']) : '' ;
        $phone_SlasheD = addslashes($phone);
        $phone_add_SQL =  ($phone != '')  ?   " AND  phone  = '$phone_SlasheD' "  : ' ' ;
        $city = isset($_GET['city'])  ? ($_GET['city']) : '' ;
        $city_SlasheD = addslashes($city);
        $city_add_SQL =  ($city != '')  ?   " AND  city  = '$city_SlasheD' "  : ' ' ;
        $state = isset($_GET['state'])  ? ($_GET['state']) : '' ;
        $state_SlasheD = addslashes($state);
        $state_add_SQL =  ($state != '')  ?   " AND  state  = '$state_SlasheD' "  : ' ' ;
        $zip = isset($_GET['zip'])  ? ($_GET['zip']) : '' ;
        $zip_SlasheD = addslashes($zip);
        $zip_add_SQL =  ($zip != '')  ?   " AND  zip  = '$zip_SlasheD' "  : ' ' ;
        // concating all now..
        $sql_ADD_all = $name_add_SQL   .  $email_add_SQL   .  $phone_add_SQL   .  $city_add_SQL   .  $state_add_SQL   .  $zip_add_SQL    ;
        // Generated using PS_filterGen  ENDS - enjoy
        ?>


# for: SQL GEN 
http://dry-project.lateraljs.org/formGen/V2_sqlGen.php?rs_name=sNav
##change rs_name as required: 

        // Slim insert:
        <?php
        /* Generated using PS_sqlGen - Slim insert STARTS -  All rights reserved.
        * Unlimited use of this script is permitted, if this header section is not removed.
        */
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Connections/PS_autoload.php';
        PS_cl_INSERT::PS_ins_goto('{tableName}', '{gotUrl.php}'); // only url no " ? " or arguments

        // Generated using PS_sqlGen - Slim insert  ENDS - enjoy
        ?>


# SLIM SELECT

        <?php
        /* Generated using PS_sqlGen STARTS -  All rights reserved.
        * Unlimited use of this script is permitted, if this header section is not removed.
        */
        // Sub sql   for  sNav STARTS
        $cookedSQL_sNav = " SELECT * from list_select order by id DESC"; // use your logic here..
        $PS_RecSet_sNav = new PS_cl_SELECT();
        $PS_RecSet_fullArr_sNav = $PS_RecSet_sNav->PS_selQ($cookedSQL_sNav, -1 ); // note limit should be -1 else, errors while pagination is in place
        $PS_RecSet_sNav_resultFull = $PS_RecSet_fullArr_sNav['results']; // creating friendly fields from 2d arr
        /*  //  'PS_RecSet_sNav_resultFull' => $PS_RecSet_sNav_resultFull,  // pass var for TWIG // should not be enabled here */
        // Sub sql   for  sNav ENDS

        // $PS_RecSet_sNav->PS_selQ_navSet('<< ', ' >> '); // echo this where you want nav also make sure bootstrap css is included
        ?>


# SLIM DROP DOWN

        <select name="third" id="third" class="form-control dropdown-select PS_select_search">
        <option value="-1" selected="">select one</option>
        <?php
        /* Generated using PS_sqlGen - SLIM DROP DOWN STARTS -  All rights reserved.
        * Unlimited use of this script is permitted, if this header section is not removed.
        */
        // make_dropDown($db_table = 'list_select', $tblKoFieldOutput_for_selValue = 'id', $tblKoFieldOutput_for_selLabel = 'title', $dropDownStrComp_selVal = '1', $whereField = 'list_s_cat', $whereValue = 'Nepal', $debug = '0')
        echo (PS_cl_static::make_dropDown('ps_list_select', 'id', 'title', '7', 'list_s_cat', 'Nepal', 0));
        ?>
        </select>


