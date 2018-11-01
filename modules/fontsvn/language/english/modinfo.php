<?php
/**
 * Font Repository Browser for the Chronolabs Cooperative Fonting Repository Services API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   	The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     	General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @author      	Simon Roberts (wishcraft) <wishcraft@users.sourceforge.net>
 * @subpackage  	fontsvn+
 * @description 	Font Repository Browser for the Chronolabs Cooperative Fonting Repository Services API
 * @version			1.0.1
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/fontsvn
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/fontsvn
 * @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/fontsvn
 * @link			http://internetfounder.wordpress.com
 */


// Admin Dashboard
define('_MD_FONTSVN_ADMIN_STATISTICS','Font Conversion Statistics');
define('_MD_FONTSVN_ADMIN_STATS_TOTALUPLOADS','Total Fonts Uploaded: %s');
define('_MD_FONTSVN_ADMIN_STATS_TOTALDOWNLOADS','Total Packs Downloaded: %s');
define('_MD_FONTSVN_ADMIN_STATS_TOTALDOWNLOADSMBS','Total Megabytes Downloaded: %s');
define('_MD_FONTSVN_ADMIN_STATS_FILESINCACHE','Total Files in Cache: %s');
define('_MD_FONTSVN_ADMIN_STATS_MBSINCACHE','Total Megabytes store in Cache: %s');
define('_MD_FONTSVN_ADMIN_STATS_FILESINREPO','Total files in Repository: %s');
define('_MD_FONTSVN_ADMIN_STATS_MBSINREPO','Total Megabytes in Repository: %s');

// Module Admin Menu
define('_MD_FONTSVN_ADMINMENU_HOME','FontSVN+');
define('_MD_FONTSVN_ADMINMENU_FONTS','Polled Fonts');
define('_MD_FONTSVN_ADMINMENU_ABOUT','FontSVN+ About');


// Module User Menus
define('_MD_FONTSVN_MENU_UPLOADS', 'Upload Fonts to API');
define('_MD_FONTSVN_MENU_RELEASES', 'Subscribe to Releases');
// Module definition headers for xoops_version.php
define('_MD_FONTSVN_MODULE_NAME','FontSVN+');
define('_MD_FONTSVN_MODULE_VERSION','1.03');
define('_MD_FONTSVN_MODULE_RELEASEDATE','01-05-2017');
define('_MD_FONTSVN_MODULE_STATUS','release');
define('_MD_FONTSVN_MODULE_DESCRIPTION','Font browser for Chronolabs Font API!');
define('_MD_FONTSVN_MODULE_CREDITS','Mynamesnot, Wishcraft');
define('_MD_FONTSVN_MODULE_AUTHORALIAS','wishcraft');
define('_MD_FONTSVN_MODULE_HELP','page=help');
define('_MD_FONTSVN_MODULE_LICENCE','gpl3+academic');
define('_MD_FONTSVN_MODULE_OFFICAL','1');
define('_MD_FONTSVN_MODULE_ICON','images/icons/module_fontsvn+.png');
define('_MD_FONTSVN_MODULE_WEBSITE','http://au.syd.snails.email');
define('_MD_FONTSVN_MODULE_ADMINMODDIR','/Frameworks/moduleclasses/moduleadmin');
define('_MD_FONTSVN_MODULE_ADMINICON16','../../Frameworks/moduleclasses/icons/16');
define('_MD_FONTSVN_MODULE_ADMINICON32','./../Frameworks/moduleclasses/icons/32');
define('_MD_FONTSVN_MODULE_RELEASEINFO',__DIR__ . DIRECTORY_SEPARATOR . 'release.nfo');
define('_MD_FONTSVN_MODULE_RELEASEXCODE',__DIR__ . DIRECTORY_SEPARATOR . 'release.xcode');
define('_MD_FONTSVN_MODULE_RELEASEFILE','https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/fontsvn/xoops2.5_fontsvn_1.01.7z');
define('_MD_FONTSVN_MODULE_AUTHORREALNAME','Simon Antony Roberts');
define('_MD_FONTSVN_MODULE_AUTHORWEBSITE','http://internetfounder.wordpress.com');
define('_MD_FONTSVN_MODULE_AUTHORSITENAME','Exhumations from the desks of Chronographics');
define('_MD_FONTSVN_MODULE_AUTHOREMAIL','simon@snails.email');
define('_MD_FONTSVN_MODULE_AUTHORWORD','');
define('_MD_FONTSVN_MODULE_WARNINGS','');
define('_MD_FONTSVN_MODULE_DEMO_SITEURL','');
define('_MD_FONTSVN_MODULE_DEMO_SITENAME','');
define('_MD_FONTSVN_MODULE_SUPPORT_SITEURL','');
define('_MD_FONTSVN_MODULE_SUPPORT_SITENAME','');
define('_MD_FONTSVN_MODULE_SUPPORT_FEATUREREQUEST','');
define('_MD_FONTSVN_MODULE_SUPPORT_BUGREPORTING','');
define('_MD_FONTSVN_MODULE_DEVELOPERS','Simon Roberts (Wishcraft)'); // Sperated by a Pipe (|)
define('_MD_FONTSVN_MODULE_TESTERS',''); // Sperated by a Pipe (|)
define('_MD_FONTSVN_MODULE_TRANSLATERS',''); // Sperated by a Pipe (|)
define('_MD_FONTSVN_MODULE_DOCUMENTERS',''); // Sperated by a Pipe (|)
define('_MD_FONTSVN_MODULE_HASSEARCH',true);
define('_MD_FONTSVN_MODULE_HASMAIN',true);
define('_MD_FONTSVN_MODULE_HASADMIN',true);
define('_MD_FONTSVN_MODULE_HASCOMMENTS',true);

// Configguration Categories
define('_MD_FONTSVN_CONFCAT_SEO','Search Engine Optimization');
define('_MD_FONTSVN_CONFCAT_SEO_DESC','');
define('_MD_FONTSVN_CONFCAT_MODULE','FontSVN+ Module Settings');
define('_MD_FONTSVN_CONFCAT_MODULE_DESC','');
define('_MD_FONTSVN_CONFCAT_SVN','FontSVN+ SVN Setting');
define('_MD_FONTSVN_CONFCAT_SVN_DESC','');


// Configuration Descriptions and Titles
define('_MD_FONTSVN_HTACCESS','.htaccess SEO URL');
define('_MD_FONTSVN_HTACCESS_DESC','');
define('_MD_FONTSVN_BASE','Base .htaccess path');
define('_MD_FONTSVN_BASE_DESC','');
define('_MD_FONTSVN_HTML','Extension for HTML output with SEO URL');
define('_MD_FONTSVN_HTML_DESC','');
define('_MD_FONTSVN_IMAGES','File extension and type of image to use with API');
define('_MD_FONTSVN_IMAGES_DESC','');
define('_MD_FONTSVN_TAGS','Support Tag 2.3+ Module');
define('_MD_FONTSVN_TAGS_DESC','');
define('_MD_FONTSVN_SCHEDULE','Maintenance scheduling method');
define('_MD_FONTSVN_SCHEDULE_DESC','This is the method the maintenance tasks are scheduled as a method of execution');
define('_MD_FONTSVN_POLL_IDENTITIES','Poll Identities JSON list');
define('_MD_FONTSVN_POLL_IDENTITIES_DESC','This is how many seconds between polling identities listing on api with preloaders');
define('_MD_FONTSVN_POLL_FONTS','Poll New Identities for Data');
define('_MD_FONTSVN_POLL_FONTS_DESC','This is how many seconds between polling new items that are listed as identities without data from the api with preloaders');
define('_MD_FONTSVN_NUMBER_POLLED_FONTS','Number of new items to poll each cron');
define('_MD_FONTSVN_NUMBER_POLLED_FONTS_DESC','This is the number of items per polling cron to get when new on the identities list');
define('_MD_FONTSVN_POLL_GLYPHS','Change Glyphs in Data');
define('_MD_FONTSVN_POLL_GLYPHS_DESC','This is how many seconds between changing the glyphs displayed on a font profile!');
define('_MD_FONTSVN_NUMBER_POLLED_GLYPHS','Number of items to change the glyphs on each cron');
define('_MD_FONTSVN_NUMBER_POLLED_GLYPHS_DESC','This is the number of items per schedule to change which glyphs display on font profiles');
define('_MD_FONTSVN_CACHE_PREVIEW','Number of second font preview is cached for from API');
define('_MD_FONTSVN_CACHE_PREVIEW_DESC','Setting to 0, disables caching!');
define('_MD_FONTSVN_CACHE_NAMING','Number of second font naming card is cached for from API');
define('_MD_FONTSVN_CACHE_NAMING_DESC','Setting to 0, disables caching!');
define('_MD_FONTSVN_CACHE_GLYPHS','Number of second glyph tile is cached for from API');
define('_MD_FONTSVN_CACHE_GLYPHS_DESC','Setting to 0, disables caching!');
define('_MD_FONTSVN_CACHE_FORMS','Number of second html forms is cached for from API');
define('_MD_FONTSVN_CACHE_FORMS_DESC','Setting to 0, disables caching!');
define('_MD_FONTSVN_DOWNLOAD_FORMATS','Formats of file download available');
define('_MD_FONTSVN_DOWNLOAD_FORMATS_DESC','This is a list of all the download file formats seperated by a comma, the file extension of the download archived pack');
define('_MD_FONTSVN_SVN_WORKING_PATH','This is the local file folder path where the SVN is working area');
define('_MD_FONTSVN_SVN_WORKING_PATH_DESC','No trailing slash!');
define('_MD_FONTSVN_SVN_USERNAME','This is the Fonts SVN Username');
define('_MD_FONTSVN_SVN_USERNAME_DESC','');
define('_MD_FONTSVN_SVN_PASSWORD','This is the Fonts SVN Password');
define('_MD_FONTSVN_SVN_PASSWORD_DESC','');
define('_MD_FONTSVN_SVN_PATH','This is the http(s) path for the SVN');
define('_MD_FONTSVN_SVN_PATH_DESC','With trailing slash!');
define('_MD_FONTSVN_SVN_JSON_PATH','This is the http(s) path for the SVN JSON Structure+Libraries Resources');
define('_MD_FONTSVN_SVN_JSON_PATH_DESC','With trailing slash!');
define('_MD_FONTSVN_SVN_CSS_PATH','This is the http(s) path for the SVN CSS Filebase Resources');
define('_MD_FONTSVN_SVN_CSS_PATH_DESC','With trailing slash!');
define('_MD_FONTSVN_SVN_RAW_PATH','This is the raw http(s) download path of individual files');
define('_MD_FONTSVN_SVN_RAW_PATH_DESC','contains the variable: <br/><br/><strong>%s</strong> - For the Internal Resolution of File path external to the root URL');
define('_MD_FONTSVN_SVN_PULL_JSON_SECONDS','This is how many seconds between pulling of the JSON Resource on the SVN');
define('_MD_FONTSVN_SVN_PULL_JSON_SECONDS_DESC','measured in seconds!');
define('_MD_FONTSVN_SVN_IMPORT_JSON_SECONDS','This is how many seconds between importing of the JSON Resource on the SVN');
define('_MD_FONTSVN_SVN_IMPORT_JSON_SECONDS_DESC','measured in seconds!');
define('_MD_FONTSVN_SVN_PULL_CSS_SECONDS','This is how many seconds between pulling of the CSS Resource on the SVN');
define('_MD_FONTSVN_SVN_PULL_CSS_SECONDS_DESC','measured in seconds!');
define('_MD_FONTSVN_SVN_REPAIRING_CSS_SECONDS','This is how many seconds between repairing of the CSS Resource on the SVN');
define('_MD_FONTSVN_SVN_REPAIRING_CSS_SECONDS_DESC','measured in seconds!');
define('_MD_FONTSVN_SVN_VERIFY_SECONDS','This is how many seconds between verification & validation of the Fonts Resource on the SVN Filebase!');
define('_MD_FONTSVN_SVN_VERIFY_SECONDS_DESC','measured in seconds!');
define('_MD_FONTSVN_SVN_CSS_REPLACE_PATH','This is the URL Paths to replace in the CSS');
define('_MD_FONTSVN_SVN_CSS_REPLACE_PATH_DESC','This is an array seperated by pipe+equal symbols\' "search==replacement||search2==replacement2||..."');
define('_MD_FONTSVN_SVN_CSS_REMOVING','This is any strings needing to be removed from the CSS!');
define('_MD_FONTSVN_SVN_CSS_REMOVING_DESC','This is an array seperated by pipe symbols\' "string1||text2||..."');
define('_MD_FONTSVN_XNEWS_TOPICID','This is the XNews Topic ID to publish new fonts under!');
define('_MD_FONTSVN_XNEWS_TOPICID_DESC','');
define('_MD_FONTSVN_API_MIN_SLEEP','API Loading Minimal Random amount of seconds');
define('_MD_FONTSVN_API_MIN_SLEEP_DESC','This is the minimal number of seconds to randomly choose from to wait before calling the API');
define('_MD_FONTSVN_API_MAX_SLEEP','API Loading Maximum Random amount of seconds');
define('_MD_FONTSVN_API_MAX_SLEEP_DESC','This is the maximum number of seconds to randomly choose from to wait before calling the API');
define('_MD_FONTSVN_API_CURL_TIMEOUT','API cURL Timeout in seconds');
define('_MD_FONTSVN_API_CURL_TIMEOUT_DESC','Number of seconds for cURL to timeout attempting to make a data retrieval');
define('_MD_FONTSVN_API_CURL_CONNECTION','API cURL Connection Timeout in seconds');
define('_MD_FONTSVN_API_CURL_CONNECTION_DESC','Number of seconds for cURL to timeout attempting to make a connection to the API');

// Block Constant Defines
define('_MD_FONTSVN_NEW_FONTS','Newest Additional Fonts');
define('_MD_FONTSVN_NEW_FONTS_DESC','This is a block that displays the latest newest fonts added and polled');
define('_MD_FONTSVN_POPULAR_FONTS','Popular Fonts Viewed');
define('_MD_FONTSVN_POPULAR_FONTS_DESC','This is the popular fonts viewed');
define('_MD_FONTSVN_POPULAR_FONTS_DOWNLOADED','Popular Fonts Downloaded');
define('_MD_FONTSVN_POPULAR_FONTS_DOWNLOADED_DESC','This is the popular fonts downloaded');
define('_MD_FONTSVN_LAST_FONTS_VIEWED','Last Fonts Viewed');
define('_MD_FONTSVN_LAST_FONTS_VIEWED_DESC','This is the last fonts viewed');
define('_MD_FONTSVN_LAST_FONTS_DOWNLOADED','Last Fonts Downloaded');
define('_MD_FONTSVN_LAST_FONTS_DOWNLOADED_DESC','This is the last fonts downloaded');
define('_MD_FONTSVN_TAG_BLOCK_CLOUD','FontSVN+ Tag Cloud');
define('_MD_FONTSVN_TAG_BLOCK_CLOUD_DESC','This is a block that displays the tag cloud for fontsvn+');
define('_MD_FONTSVN_TAG_BLOCK_TOP','FontSVN+ Top Tags');
define('_MD_FONTSVN_TAG_BLOCK_TOP_DESC','This is a block that displays the top tags for fontsvn+');

// Notification Constant Defines
define('_MD_FONTSVN_GLOBAL_NOTIFY','FontSVN+ Notifications');
define('_MD_FONTSVN_GLOBAL_NOTIFY_DESC','The notifications available in FontSVN+');
define('_MD_FONTSVN_GLOBAL_NEWINDEX_NOTIFY','New Index Category Added from API');
define('_MD_FONTSVN_GLOBAL_NEWINDEX_NOTIFY_CAPTION','New Index Category Added from API');
define('_MD_FONTSVN_GLOBAL_NEWINDEX_NOTIFY_DESC','This is when a new index or base is added to the category of fonts');
define('_MD_FONTSVN_GLOBAL_NEWINDEX_NOTIFY_SUBJECT','New Category Added to FontSVN+ Font API Browser');
define('_MD_FONTSVN_GLOBAL_NEWFONT_NOTIFY','New Browsable Font Added from API');
define('_MD_FONTSVN_GLOBAL_NEWFONT_NOTIFY_CAPTION','New Browsable Font Added from API');
define('_MD_FONTSVN_GLOBAL_NEWFONT_NOTIFY_DESC','This is when a new font is added from the API via polling!');
define('_MD_FONTSVN_GLOBAL_NEWFONT_NOTIFY_SUBJECT','New Font Available for Browsing in FontSVN+');

?>