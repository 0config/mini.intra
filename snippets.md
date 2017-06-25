Filter gen: 
visit:http://dry-project.lateraljs.org/formGen/V2_filterGen.php?filters=name|email|phone|city|state|zip&condition=AND

add:  'filter' seperated by |
: condition : AND or OR

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
