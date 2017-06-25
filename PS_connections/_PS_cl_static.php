<?php

//include_once PS_UNDERGROUND . '/PS_connections/PS_autoload.php';

/**
 * Description of PS_static
 *
 * @author P
 */
class PS_cl_static
{

//put your code here
// 'ps_list_select', 'id', 'title', '7', 'list_s_cat', 'Nepal', 0)
    /** usage 'ps_list_select' > tableName, 'id' =>  value, 'title' text value,  '7' = >select field id, 'list_s_cat' =>  filterField, 'Nepal' => filterValue, '0/1'-Debug Mode
     * @author P Singh 74644p@gmail.com
     *
     *
     */


    public static function make_dropDown($db_table = 'ps_list_select', $tblKoFieldOutput_for_selValue = 'id', $tblKoFieldOutput_for_selLabel = 'title', $dropDownStrComp_selVal = '1', $whereField = 'list_s_cat', $whereValue = 'Nepal', $debug = '0')
    {

        if ($whereField != '') {
            $whereSQL = " WHERE  $whereField  = '" . $whereValue . "'";
        } else {
            $whereSQL = " ";
        }
        $sqlGenerated = "SELECT $tblKoFieldOutput_for_selValue, $tblKoFieldOutput_for_selLabel FROM $db_table $whereSQL order by  $tblKoFieldOutput_for_selLabel ASC ";

        try {
            $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $selectQry = $db->prepare($sqlGenerated);

            $qryRes = $selectQry->execute();
            if ($qryRes) {
                $resultQty = $selectQry->rowCount();
            } // if ends

            $out = " ";
            /* removed 
             *
              $out = "<select name='$whereField' class=\"form-control dropdown-select\" data-filter=\"true\" >";
              $out .= '
              <option value="-1"  >Please select</option>';
             *  */

            while ($row = $selectQry->fetch(PDO::FETCH_ASSOC)) {
                $dropDownSelectedAdd = strcasecmp($row['id'], $dropDownStrComp_selVal) ? '' : 'selected="selected"';

                $out .= '
		 <option value="' . $row[$tblKoFieldOutput_for_selValue] . '" ' . $dropDownSelectedAdd . '>' . $row[$tblKoFieldOutput_for_selLabel] . '</option>';
            }
            if ($debug == 1) {
                $out .= "<option value=\"$sqlGenerated\" > Debug = TRUE </option>";
            }
            /* select has been removed
              $out .= '
              </select>';
             */

            $db = null;
        } // try ends
        catch (PDOException $e) {
            trigger_error("Error :" . $e->getMessage(), E_USER_ERROR);
            $result = 'an error occured';
        } // if  statement ends
// return ( $resultArr[1]['title']  );
// return ( $resultArr );
        return ($out);
    }

    // cat drop STARTS

    // make_dropDown_arrCond Starts
    public static function make_dropDown_arrCond($db_table = 'ps_list_select', $tblKoFieldOutput_for_selValue = 'id', $tblKoFieldOutput_for_selLabel = 'title', $dropDownStrComp_selVal = '1', $arrCond, $debug = '0')
    {

//        $whereSQL = "";
        /*        if ($whereField != '') {
                    $whereSQL = " WHERE  $whereField  = '" . $whereValue . "'";
                } else {
                    $whereSQL = " ";
                }*/

//        $whereField = '';
        $whereSQL = " WHERE  ";
        if (count($arrCond) > 0) {
            foreach ($arrCond as $key => $arrSingle) {
                $whereSQL .= "  $key    " . key($arrSingle) . " '" . $arrSingle[key($arrSingle)] . "' " . " AND ";


            }

        } else {
            $whereSQL = "  ";
        }
        $whereSQL = trim($whereSQL);
        $whereSQL = trim($whereSQL, 'AND');
        $sqlGenerated = "SELECT $tblKoFieldOutput_for_selValue, $tblKoFieldOutput_for_selLabel FROM $db_table $whereSQL order by  $tblKoFieldOutput_for_selLabel ASC ";

        try {
            $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $selectQry = $db->prepare($sqlGenerated);

            $qryRes = $selectQry->execute();
            if ($qryRes) {
                $resultQty = $selectQry->rowCount();
            } // if ends

            $out = " ";
            /* removed
             *
              $out = "<select name='$whereField' class=\"form-control dropdown-select\" data-filter=\"true\" >";
              $out .= '
              <option value="-1"  >Please select</option>';
             *  */

            while ($row = $selectQry->fetch(PDO::FETCH_ASSOC)) {
                $dropDownSelectedAdd = strcasecmp($row['id'], $dropDownStrComp_selVal) ? '' : 'selected="selected"';

                $out .= '
		 <option value="' . $row[$tblKoFieldOutput_for_selValue] . '" ' . $dropDownSelectedAdd . '>' . $row[$tblKoFieldOutput_for_selLabel] . '</option>';
            }
            if ($debug == 1) {
                $out .= "<option value=\"$sqlGenerated\" > Debug = TRUE </option>";
            }
            /* select has been removed
              $out .= '
              </select>';
             */

            $db = null;
        } // try ends
        catch (PDOException $e) {
            trigger_error("Error :" . $e->getMessage(), E_USER_ERROR);
            $result = 'an error occured';
        } // if  statement ends
// return ( $resultArr[1]['title']  );
// return ( $resultArr );
        return ($out);
    }

    // make_dropDown_arrCond Ends


    public static function make_catDropDown($db_table = 'ps_list_select', $tblKoFieldOutput_for_selValue = 'list_r_cat', $tblKoFieldOutput_for_selLabel = 'list_r_cat', $debug = '0')
    {


        $sqlGenerated = "SELECT $tblKoFieldOutput_for_selValue, $tblKoFieldOutput_for_selLabel FROM $db_table where pub_stat != 0  group by $tblKoFieldOutput_for_selLabel order by  $tblKoFieldOutput_for_selLabel DESC";

        try {
            $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $selectQry = $db->prepare($sqlGenerated);

            $qryRes = $selectQry->execute();
            if ($qryRes) {
                $resultQty = $selectQry->rowCount();
            } // if ends

            $out = " ";


            while ($row = $selectQry->fetch(PDO::FETCH_ASSOC)) {
                $out .= '
		 <option value="' . $row[$tblKoFieldOutput_for_selLabel] . '" >' . $row[$tblKoFieldOutput_for_selLabel] . '</option>';
            }
            if ($debug == 1) {
                $out .= "<option value=\"$sqlGenerated\" > Debug = TRUE </option>";
            }


            $db = null;
        } // try ends
        catch (PDOException $e) {
            trigger_error("Error :" . $e->getMessage(), E_USER_ERROR);
            $result = 'an error occured';
        } // if  statement ends

        return ($out);
    }

    // cat drop ENDS
    // make_returnField STARTS
    // table_name, id valuue, field_name, debug
    /**
     * USAGE::('<table_name>', <id>, '<return_tbl_field>', 0)
     * @example db_table: table_name, id valuue, field_name, debug
     * @return string Returns string
     * @param  string $db_table specify table name
     * @param int $id pass id
     * @param string $list_select specify your table name here
     * @param  string $return_field returns this fields value as return value
     * @param string $debug concats executed SQL to return string
     *
     *
     */
    public static function make_returnField($db_table = 'ps_list_select', $id = '1', $return_field = 'list_r_cat', $debug = '0')
    {


        $sqlGenerated = "SELECT $return_field, $id FROM $db_table WHERE id = $id ";

        try {
            $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $selectQry = $db->prepare($sqlGenerated);

            $qryRes = $selectQry->execute();
            if ($qryRes) {
                $resultQty = $selectQry->rowCount();
            } // if ends

            $out = " ";


            while ($row = $selectQry->fetch(PDO::FETCH_ASSOC)) {
//                $out .= '<option value="' . $row['list_r_cat'] . '" >' . $row['list_r_cat'] . '</option>';
                $out .= $row[$return_field];
            }
            if ($debug == 1) {
                $out .= "<BR> $sqlGenerated";
            }


            $db = null;
        } // try ends
        catch (PDOException $e) {
            trigger_error("Error :" . $e->getMessage(), E_USER_ERROR);
            $result = 'an error occured';
        } // if  statement ends

        return ($out);
    }

// make_returnField ENDS


    public static function now()
    {
        return (date("Y-m-d H:i:s"));
// now ends
    }

    public static function timeAgo($date)
    {
        if (empty($date)) {
            return "No date provided";
        }
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();

        $unix_date = strtotime($date);

// check validity of date

        if (empty($unix_date)) {
            return "Bad date";
        }

// is it future date or past date

        if ($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense = "ago";
        } else {
            $difference = $unix_date - $now;
            $tense = "from now";
        }

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$j] .= "s";
        }

        return "$difference $periods[$j] {$tense}";
// timeAgo ENDS
    }

    /** 1s param becokes key for _GET and 2nd param becomes value, remaining _GET params will be as is
     * @param $popGet becomes  _GET[$popGet]
     * and $popValue becomes "value"
     *  */
    public static function get_popInject($popGet = 'none', $popValue = 'null')
    {
        $urlArray = $_GET;
        if (array_key_exists($popGet, $urlArray)) {
            unset($urlArray[$popGet]);
        }
        $urlArray[$popGet] = $popValue; // adding new value
        $urlRegenLink = '';
        foreach ($urlArray as $key => $value) {
            $urlRegenLink .= $key . '=' . $value . '&';
        }
        $urlArrayReturn = rtrim($urlRegenLink, '&');
        return ($urlArrayReturn);
// get_popInject ENDS
    }

    /** $PS_fileUpPath = isset($_FILES['image']) ? (PS_static::fileUpload('documents/')['path']) : 'type="file"_name="image"_notFound.jpg';
     * @example    i.e. location /public_uploads/{documents} and {path} returns  file path where image is uploaded
     * @return this_will+return->"folder/file.name.ext"
     */
    public static function fileUpload($imageDir = 'images/')
    {
        if (isset($_FILES['image'])) {
            $PS_pic_rand = rand(1000000, 9999999) . '-';
            $PS_fileLocation = PS_SERVER_FILE_UP_DIR . $imageDir;
            $errors = array();
            $file_name = $PS_pic_rand . $_FILES['image']['name'];
            $PS_up_fileNamePath = PS_PUBLIC_FILE_UP_PATH . $imageDir . $file_name;
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $path_parts = pathinfo($file_name);
            $file_ext = strtolower($path_parts['extension']);
            $extensions = array("php", "php3", "pl", "py", "htaccess", "htpassword", "ini", "log", "htm", "html", "exe", "bat", "bash", "sh");
            if (in_array($file_ext, $extensions) === true) {
                $errors[] = "Executables not allowed";
                $errorMessage = "Executables not allowed";
                $PS_up_fileNamePath = PS_PUBLIC_FILE_UP_PATH . 'images/executive_files_not_allowed.jpg';
                $PS_up_result = 0;
                echo $errorMessage;
                PS_cl_log::errorAll($errorMessage);

                exit;
            }
            $allowedFileSize = 1000000;
            if ($file_size > $allowedFileSize) { // defautl 2MB was 2097152
                $errors[] = 'Large file size detected ' . $file_size . ' is more than allowed size ' . $allowedFileSize;
                $errorMessage = 'Large file size detected ' . $file_size . ' is more than allowed size ' . $allowedFileSize;
                $PS_up_fileNamePath = PS_PUBLIC_FILE_UP_PATH . 'images/large_file_uploaded.jpg';
                $PS_up_result = 0;
                echo $errorMessage;
                PS_cl_log::errorAll($errorMessage);
                exit;
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $PS_fileLocation . $file_name);
                $PS_up_fileName = $PS_fileLocation . $file_name;
                $PS_up_result = 1;
            } else {
                $PS_up_error_array = ($errors);
            }
            return ['result' => $PS_up_result, 'path' => $PS_up_fileNamePath];
        } // isset$_Files'image' ends
    }

    /* anything below has been replace with better ones */

    // fileUpload ENDS
    // this has been replaced with PS_cl_csrf::post_selfOnly(); 
// returns 1 if self post detected, else 0 .. will keep quite if no post is detected 
    public static function selfPost()
    {
        if (count($_POST) > 0) {
            $PS_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $PS_referer_Step1 = (parse_url($PS_referer));
            $PS_refererPath = $PS_referer_Step1['path'];
            $returnVal = ($PS_refererPath == $_SERVER['PHP_SELF']) ? 1 : 0;
        } else {
            $returnVal = -1;
        }

        return ($returnVal);
    }

    /* anything above has been replace with better ones */
}

?>