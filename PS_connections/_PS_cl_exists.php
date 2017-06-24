<?php

//include_once PS_UNDERGROUND . '/PS_connections/PS_autoload.php';

/**
 * Description of PS_static
 *
 * @author P
 */
class PS_cl_exists
{

    public static function session($name, $value, $level = 'check') // level:check|create|delete
    {
        @session_start();

        //  create starts
        if ($level == 'create') {
            $_SESSION[$name] = $value;
            return 1;
        }//  create ends
        elseif ($level == 'delete') {

            if ((isset($_SESSION[$name])) and ($_SESSION[$name] == $value)) {
                unset($_SESSION[$name]);
                return 1; // deleted
            } else {
                return 0;
            }

        } // delete ends
        else { // check / default  starts

            if (isset($_SESSION[$name])) { // check if session is set
                if ($_SESSION[$name] == $value) { // if value match
                    return 1; // session key and value match
                } else {
                    return -1;// session exists but value does not match
                }
            } else {
                return 0; // session does not exist
            }
        } //  check / default ends
    } // static ends
} // class ends

?>