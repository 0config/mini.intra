<?php
require_once(PS_UNDERGROUND . '/PS_connections/PS_autoload.php');
require_once(PS_UNDERGROUND . '/vendor/phpFlashMessages/phpFlashMessages.php');
if (!session_id()) @session_start();
// Instantiate the class
$PS_flashMsg = new \Plasticbrain\FlashMessages\FlashMessages();
?>