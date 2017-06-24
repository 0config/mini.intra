<?php
/* 
note: s , e, n, u validation pending  */
class PS_cl_server {

    public static function post($input, $len = 0, $type = 's') {
        if (isset($_POST[$input])) {
            $output = $_POST[$input];
            $count = strlen($output);
            if (!($count >= $len)) {
                // pending 
                // set a global value from here 
                // in make sure to check this above mentioned value before firing sql
                // if global value is set do not insert but stop the page..
                echo 'make sure javascript is enabled and form is posted properly. [Validation ERROR - > PS_server::post ] ';
                exit;
            }
        } else {
            $output = '';
            $count = '';
        }
        return $output;
    }

     public static  function get($input, $len = 0, $type = 's') {
        if (isset($_GET[$input])) {
            $output = $_GET[$input];
            $count = strlen($output);
            if (!($count >= $len)) {
                // pending 
                // set a global value from here 
                // in make sure to check this above mentioned value before firing sql
                // if global value is set do not insert but stop the page..
                echo 'make sure javascript is enabled and form is posted properly. [Validation ERROR - > PS_server::get ] ';
                exit;
            }
        } else {
            $output = '';
            $count = '';
        }
        return $output;
    }

}

?>