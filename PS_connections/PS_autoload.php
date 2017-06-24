<?php

/**
 * Usage: echo PS_DOCROOT . '/yourDir/yourFileName.php';
 *
 * @author P
 */

require_once(PS_UNDERGROUND . '/PS_connections/_PS_connxPDO.php'); // new connection


// require_once(PS_UNDERGROUND . '/PS_connections/_PS_mySQL_pdo.php'); // mysql PDO master details
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_Routes.php'); // urlEn, Keyword, Trim etc here need to make as class>static fn..
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_insert.php'); // insert added 100516
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_insRaw.php'); // insert added 03.14.17



// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_static.php');
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_barcode.php');
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_log.php');// note this should always be before  _acl
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_acl.php');// note this should always be before  _log
require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_server.php');
require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_csrf.php');
require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_formSelect.php');
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_selRetQty.php'); // added 03.14.17 returns only rec quantity
require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_preety.php');
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_xhr.php');
// require_once(PS_UNDERGROUND . '/PS_connections/_PS_cl_forms.php');
?>