<?php

// formGen V3  from _inc_formGenOut
//require_once (PS_UNDERGROUND . '/PS_connections/PS_autoload.php'); // fix your connection here

class PS_cl_formSelect {

    public static function single_select_returnArr($SQL = '') {
        try {
            $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $selectQry = $db->prepare($SQL);
            if ($selectQry->execute()) {
                $result = ' select success ';
                $resultQty = $selectQry->rowCount();
                if ($resultQty != 1) {
                    echo $errorAll = ' ERROR : ' . $resultQty . ' result/s returned [ probably: {id} and {sid} mismatch] ';
                    PS_cl_log::errorAll($errorAll); // logging error log
                    exit;
                } // if resultQty ends
                $row = $selectQry->fetchAll(PDO::FETCH_ASSOC); // making array 

                return ($row);
            } // if selectQry->execute ends 
            $db = null;
        } // try ends
        catch (PDOException $e) {
            $errMessage = 'PDOException error ' . $e->getMessage();
            PS_cl_log::errorAll($errMessage); // logging error log
            echo ("PDOException Error occured [@select]: see log for details . "); // org //         
            exit; // trigger_error("Error occured:" . $e->getMessage(), E_USER_ERROR);
        }  // catch ends
    }

    public static function select_returnArr_DEPRECATED($SQL = '') {
        try {
            $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $selectQry = $db->prepare($SQL);
            if ($selectQry->execute()) {
                $result = ' select success ';
                $resultQty = $selectQry->rowCount();

                $row = $selectQry->fetchAll(PDO::FETCH_ASSOC); // making array

                return ($row);
            } // if selectQry->execute ends
            $db = null;
        } // try ends
        catch (PDOException $e) {
            $errMessage = 'PDOException error ' . $e->getMessage();
            PS_cl_log::errorAll($errMessage); // logging error log
            echo ("PDOException Error occured [@select]: see log for details . "); // org //
            exit; // trigger_error("Error occured:" . $e->getMessage(), E_USER_ERROR);
        }  // catch ends
    }
    //
}

?>