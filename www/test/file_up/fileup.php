<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/PS_settings/PS_master.php');


$a = PS_cl_static::fileUpload();
var_dump($a);
// do your insert into sql table here..

?>
<form action=""  method="post" enctype="multipart/form-data" >


<input type="file" name="image">
<button>up</button>
</form>

<Hr>
// make sure that you have  a form posted with enctype= multipart/form-data <BR>
// input field with type=file and name=image<BR>
// note this does 1 file at a time<BR>
// this excludes common executable files<BR>

</body>
</html>