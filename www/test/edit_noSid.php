<?php  require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php'); // fix your connection file path here..
$id = PS_cl_server::get('id'); // modified with PS_cl_formSelect working 06.08.16
$successGoTo = "/result.php";
$successMessage = 'Thank you . Updated succesfully.';// $PS_flashMsg->success('$sucessMessage'); // info|success|warning|error

if (($id == '')  ) {
    PS_cl_pretty::exit_w_log("id and / or sid not set - please try again");  //  echo 'id and / or sid not set'; //    exit;
}
$selectQry ="SELECT title, name, email, password FROM trial_table WHERE id = $id   " ;
$row = PS_cl_formSelect::single_select_returnArr($selectQry); // getting 
$rowSingle = $row[0]; // converting  to required one

 // UPDATE QUERY starts
// check if this form is posted STARTS
if (isset($_POST['real_submit'])) {

/* enable below if code  to check if, this is self post */
    PS_cl_csrf::post_selfOnly(); // do not echo this file 

try {
    $title = PS_cl_server::post("title" , 0, "s");
    $name = PS_cl_server::post("name" , 0, "s");
    $email = PS_cl_server::post("email" , 0, "s");
    $password  = PS_cl_server::post("password " , 0, "s");
    
    $dbUpdate = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
    $dbUpdate->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $updateQry = $dbUpdate->prepare("UPDATE  trial_table  SET   title =:title , name =:name , email =:email   WHERE  id = $id  " ) ; // map your fields for UPDATE, ie. replace sql WHERE fields > id and sid
    // $updateQry = $dbUpdate->prepare("UPDATE  trial_table  SET   title =:title, name =:name, email =:email, password  =:password   WHERE  id = $id  " ) ; // map your fields for UPDATE, ie. replace sql WHERE fields > id and sid

    // binding starts


    $updateQry->bindParam(':title', $title, PDO::PARAM_STR );
$updateQry->bindParam(':name', $name, PDO::PARAM_STR );
$updateQry->bindParam(':email', $email, PDO::PARAM_STR );
// $updateQry->bindParam(':password ', $password , PDO::PARAM_STR );

    $updateSQL = $updateQry->execute(); 

        if($updateSQL){
        $result =  $updateSQL;
        } // if  statement ends
    $db = null;
    } // try ends

    catch (PDOException $e) {
        $errMessage = 'PDOException error ' . $e->getMessage();
         echo ("PDOException Error occured [@update]: see log for details . "); // org //       
         var_dump($e);   
        exit; // trigger_error("Error occured:" . $e->getMessage(), E_USER_ERROR);
    }  // catch ends

} // check if this form is posted ENDS

// update q ENDS
?><?php  
if(isset( $updateSQL )){
    header("Location: $successGoTo?updateSQL=$updateSQL&id=$id&sid=$sid" );
    exit ; 
}
?>
    <!DOCTYPE html>
    <html>

    <head>
      <title> Title </title>
      <!--change your style sheet here -->
      <link id="abcd" rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



      <!-- your jquery path here jquery and jQ bs-->
      <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>

      <!--for form validation-->
      <script type="text/javascript" src="/js/validator.min.js"></script>
    </head>

    <body>



      <!--nav bar starts-->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <a href="../" class="navbar-brand">{ YOUR Domain HERE }</a>


        </div>
      </div>
      <!--nav bar ENDS -->






      <!--form html STARTS -->



      <div class="" style="margin-top: 50px;">

        <div id="PS_formXHR_parent">
          <h1 class="text-center">
Change your form name here            </h1>
          <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 success">
            <form data-toggle="validator" action="" method="post" novalidate="true" id="PS_formXHR" ps_lateral_id="PS_formXHR_parent">



              <label for=title class="control-label">Label for [ title ]</label>
              <div class="form-group has-feedback ">
                <input class="form-control " name="title" id="title" value="<?php  echo isset( $rowSingle['title'])? $rowSingle['title'] : '' ; ?>" placeholder="" data-error="Please verify your information" data-minlength='3' type='text' />
                <div class="clearfix help-block with-errors  "></div>

                <span class="glyphicon form-control-feedback"></span></div>
              <BR/>
              <label for=name class="control-label">Label for [ name ]</label>
              <div class="form-group has-feedback ">
                <input class="form-control " name="name" id="name" value="<?php  echo isset( $rowSingle['name'])? $rowSingle['name'] : '' ; ?>" placeholder="" data-error="Please verify your information" data-minlength='3' type='text' />
                <div class="clearfix help-block with-errors  "></div>

                <span class="glyphicon form-control-feedback"></span></div>
              <BR/>
              <label for=email class="control-label">Label for [ email ]</label>
              <div class="form-group has-feedback ">
                <input class="form-control " name="email" id="email" value="<?php  echo isset( $rowSingle['email'])? $rowSingle['email'] : '' ; ?>" placeholder="" data-error="Please verify your information" data-minlength='3' type='text' />
                <div class="clearfix help-block with-errors  "></div>

                <span class="glyphicon form-control-feedback"></span></div>
              <BR/>
              <label for=password class="control-label">Label for [ password ]</label>
              <div class="form-group has-feedback ">
                <input class="form-control " name="password " id="password " value="<?php  echo isset( $rowSingle['password '])? $rowSingle['password '] : '' ; ?>" placeholder="" data-error="Please verify your information" data-minlength='3' type='text' />
                <div class="clearfix help-block with-errors  "></div>

                <span class="glyphicon form-control-feedback"></span></div>
              <BR/>
              <input name="real_submit" type="hidden" value="real_submit" />

              <input type="submit" class="btn btn-success" value="Submit" />
            </form>


          </div>
        </div>
      </div>

      <div class="clearfix"></div>



      <!--form html ENDS  -->










      <div class="container">
        <div class="code bg-success">



          <HR/>
        </div>
      </div>





      <div class="container" id="gen_code">
        <!--from incl file-->
        <link href="rainbow/css/dreamweaver.css" rel="stylesheet" type="text/css" />

        <script src="rainbow/js/rainbow.min.js" type="text/javascript"></script>
        <script src="rainbow/js/generic.js" type="text/javascript"></script>
        <script src="rainbow/js/php.js" type="text/javascript"></script>



      </div>
      <!--anything below this is not required-->

      <a href="#" id="united">united</a>
      <a href="#" id="journal">journal</a>
      <script>
        $(document).ready(function() {
          console.log("ready!");
          $("#journal").click(function() {
            $("#abcd").attr("href", "http://bootswatch.com/journal/bootstrap.min.css");

          });
          $("#united").click(function() {
            $("#abcd").attr("href", "http://bootswatch.com/united/bootstrap.min.css");

          });
        });
      </script>

    </body>

    </html>