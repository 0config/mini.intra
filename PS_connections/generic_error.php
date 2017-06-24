<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
<div class="container">
    <BR>
    <div class="bg-danger text-center">
        <BR>
        <?php if(isset($message)){
            echo '<h1>'.$message . '</h1>';
        }
        else {
            echo '<h1> UNDEFINED error occured </h1>';
        }
        ?>
        <BR>
    <hr>
        Other options and suggestions  with links here ..<BR> <BR>
    </div>
    <BR>
</div>