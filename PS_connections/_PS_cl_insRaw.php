<?php

class PS_cl_insRaw
{

    public static function PS_ins_withResult($tableName, $arrPass, $errRep = '0')
    {


        if (!isset($tableName, $arrPass, $errRep)) {
            echo 'required vars not set : $tableName, $arrPass, $errRep ';
        }
        $rand_rid = rand(10000, 99999);
        $rand_sid = rand(10000, 99999);
        $dateTimeNow = date("Y-m-d H:i:s");
        $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : '0';

        $PS_insert_tableName = $tableName;
        $compactArray = array(
            "rid" => $rand_rid,
            "sid" => $rand_sid,
            "uid" => $uid,
            "timeSfirst" => $dateTimeNow
        );
        $compactArray_merged = array_merge($compactArray, $arrPass);

//        var_dump($compactArray_merged);


// make sure to limit this activity
// also make sure that only authorized user has access to this file
// protect this file to authorized users only
// limit one per minute or something like that
// also make sure that there is no stale insert pending before this one..
//
//

        $PS_cnx_insertSingle = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD); // GETS VALUE FROM _PS_connxPDO.php

        $PS_allKeys = "";
        $PS_allValues = "";
        foreach ($compactArray_merged as $key => $value) {
            $PS_allKeys .= $key . ', ';
            $PS_allValues .= ':' . $key . ', ';


        }
        $PS_allKeys = trim($PS_allKeys, ', ');
        $PS_allValues = trim($PS_allValues, ', ');

        $statement = $PS_cnx_insertSingle->prepare("INSERT INTO $PS_insert_tableName( $PS_allKeys ) VALUES( $PS_allValues )");

        $insert_status = $statement->execute($compactArray_merged);
        $PS_insertID = $PS_cnx_insertSingle->lastInsertId();

        if ($insert_status == 1) {

//            $stmt1 = $conn->prepare("INSERT INTO data($columns) VALUES ($values)");
//            $stmt1->execute($array);
//            echo "INSERT INTO data($columns) VALUES ($values)";

            return   $PS_insertID; // returns lastInsertId
        } else {
            echo $PS_cnx_insertSingle->errorCode();

            PS_cl_pretty::exit_w_log("and error occured.. make sure table name is correct and try again ");
            echo $insert_status;
        }
    }


}

?>