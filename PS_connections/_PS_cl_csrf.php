<?php

class PS_cl_csrf {

    /**
     * do not echo this file. This will auto exit if post is not self
     */
    public static function post_selfOnly() {
        if ((isset($_POST)) and ( count(($_POST)) > 1 )) {
            // echo 'do your post logic here ';
            $PS_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $PS_referer_Step1 = ( parse_url($PS_referer) );
            $PS_refererPath = $PS_referer_Step1['path'];
            $selfScriptName = $_SERVER['PHP_SELF'];
            $allow = ($PS_refererPath == $selfScriptName ) ? 1 : 0;
            if ($allow == 1) {
                // allow
            } else {
                echo "<h1>Please contact your System Admin</h1> <HR> $PS_refererPath <  CSRF post  > $selfScriptName   ";
                exit;
            }
            return($allow);
        }
    }

    /**
     * do not echo this file. This will auto exit if post is not self
     */
    public static function get_denyExternal() {
        // if referer is defined and and from the same host allows, else denies 
        $PS_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'http://noreferer';
        $PS_referer_getHost = parse_url($PS_referer, PHP_URL_HOST);
        $serverHostName = $_SERVER['SERVER_NAME'];
        $allow = ($PS_referer_getHost == $serverHostName ) ? 1 : 0;
        if ($allow == 1) {
            // allow
        } else {
            echo "<h1>Please contact your System Admin</h1> <HR> $serverHostName <  CSRF get > $PS_referer_getHost   ";
            exit;
        }
        return($allow);
    }

}

?>