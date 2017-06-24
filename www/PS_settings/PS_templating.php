<?php
require_once(PS_UNDERGROUND . '/PS_connections/PS_autoload.php');
require_once(PS_UNDERGROUND . '/vendor/autoload.php');


// twig part 1 of 2
$loader = new Twig_Loader_Filesystem(PS_UNDERGROUND . '/PS_templates');
if ($PS_session_debug == 1) {
    $twig = new Twig_Environment($loader, array(
        'debug' => true, // change this to false in production..
        // ...
    ));
} else {
    $twig = new Twig_Environment($loader, array(
        'debug' => false, // change this to false in production..
        // ...
    ));
}

$twig->addExtension(new Twig_Extension_Debug());

// adding custom filter starts
// first filter
$filter = new Twig_SimpleFilter('PS_toUpperTest', function ($string) {
    return strtoupper($string . ' added');
});

//second filter
/*$filter_PS_url_en = new Twig_SimpleFilter('PS_url_en', function ($url2en) {
    $searchURL_en = array('/', '-', ' ', '_', '&', '%', '?', '.', '@', '\\');
    $replaceURL_en = array('[[sl]]', '^', '-', '!', '[[A]]', '[[P]]', '[[Q]]', '[[D]]', '[[a]]', '[[bs]]');
    $outputURL_en = $url2en;
    return str_replace($searchURL_en, $replaceURL_en, $outputURL_en);

});*/
$filter_PS_url_en = new Twig_SimpleFilter('PS_url_en', function ($url2en) {
    return PS_urlEn($url2en); // PS_urlEn() coming from PS_routes
});
// adding custom filter ENDS


// register custom filter starts
$twig->addFilter($filter);
$twig->addFilter($filter_PS_url_en);
// register custom filter ENDS
?>
<?php
function PS_render($template, $context)
{
    global $twig;
    $default_temp_ext = '.html.twig';
    return $twig->render($template . $default_temp_ext, $context);
}

?>
