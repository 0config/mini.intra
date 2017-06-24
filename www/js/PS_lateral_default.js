// NOTE: either don't define or give accurate values else will not work properly

PS_default_input = { // all below codes should be converted to this object onwards
    'PS_h1_magic': 1, // 0 = disabled , 1 = enabled , anthting else disabled
};
var PS_lateral_path = '/js';
var PS_path_reload_js = '/js/load.js'; // defining which path to load for analytics and other js after all job is done
var PS_img_loading_link = PS_lateral_path + 'PS_loading.gif'; // '/js/load.js' changed to
var PS_scroll_topMargin = 70; // default 60// top margin to leave for fixed scroll lock
var PS_scroll_timeInMilSec = 500; // default 500
var PS_h1_magic = 0; // if defined will consider true or 1
var PS_debug = 1; // default 0  need to fix all over below
var PS_loading_html = '<div class="load-bar"><div class="bar"></div><div class="bar"></div><div class="bar"></div></div><div>loading.. from override.. 12.14.16</div>';
var PS_loading_image = 'loading content from override .. 12.14.16 ....... <BR><div class=\"text-center" style="background-color: white"><img src="/images/PS_system/PS_loading.gif" class="PS_loading" /></div>';
console.log('PS_later_default.js loaded.. 01.11.17...');
