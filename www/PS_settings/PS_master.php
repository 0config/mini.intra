<?php
@session_start();
date_default_timezone_set('America/Los_Angeles');//or change to whatever timezone you want
define("PS_DOCROOT", $_SERVER['DOCUMENT_ROOT'] );// if you add path to this make sure you do not put / at end
// \define("PS_DOCROOT", filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') );
// for PS_UNDERGROUND STARTS - thi will take 1 level down docroot
$exp = explode("/", PS_DOCROOT); //
$exp_pop = array_pop($exp); // removing trailing folder
$exp_join = join("/", $exp); // now joining excluding last folder
define("PS_UNDERGROUND", $exp_join); // for PS_UNDERGROUND ENDS

//$PS_fileLocation
define("PS_SERVER_FILE_UP_DIR", PS_DOCROOT . "/public_uploads/"); // for where to upload
define("PS_PUBLIC_FILE_UP_PATH", "/public_uploads/"); // for linking image in html

require_once('PS_session.php');// sets error_reporting based on if session > u_group contains 'debug' group

require_once(PS_UNDERGROUND . '/PS_connections/PS_autoload.php');

require_once PS_DOCROOT . '/PS_settings/PS_loginCheck.php';
require PS_DOCROOT . '/PS_settings/PS_templating.php'; // if you enable this please get twig stuff from
require PS_DOCROOT . '/PS_settings/PS_phpFlahsMessages.php';
// context passon for templating
$session = $_SESSION;
$PS_flashMsgOut = $PS_flashMsg->display('', false);
$title = $description = $keywords = $robots = ' '; // for meta partials only , this is later defined individually
?>