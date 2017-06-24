<?php
//require_once (PS_UNDERGROUND . '/PS_connections/PS_autoload.php'); // fix your connection here

class PS_cl_pretty
{
    public static function exit_w_log($message = '')
    {
        // PS_cl_log::errorAll($message);
        require_once PS_UNDERGROUND . '/PS_connections/generic_error.php'; // template file with error output
        //echo $message;
        exit;

    }
}

?>