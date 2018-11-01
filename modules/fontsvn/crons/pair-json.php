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

    global $fontsvnModule, $fontsvnConfigsList, $fontsvnConfigs, $fontsvnConfigsOptions;
	
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'header.php';
	xoops_load("XoopsCache");
	xoops_load("XoopsLists");
	
	set_time_limit(8444);
	
	if (!empty($fontsvnConfigsList['svn_username']) && !empty($fontsvnConfigsList['svn_password'])) {
	    if (!is_dir($fontsvnConfigsList['svn_working_path']) || count(XoopsLists::getDirListAsArray($fontsvnConfigsList['svn_working_path'] . DS . 'json')) == 0) {
	        mkdir($fontsvnConfigsList['svn_working_path'], 0777, true);
	        shell_exec("chmod -Rf 0777 \"" . $fontsvnConfigsList['svn_working_path'] . "\"");
	        shell_exec("chown -Rf www-data:www-data \"" . $fontsvnConfigsList['svn_working_path'] . "\"");
	        shell_exec("svn checkout --username=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_username'])) . " --password=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_password'])) . " \"" . $fontsvnConfigsList['svn_json_path'] . "\" \"" . $fontsvnConfigsList['svn_working_path'] . DS . 'json"');
	        XoopsCache::write('seconds.'.basename(__FILE__), array('when' => microtime(true)), $fontsvnConfigsList['svn_pull_json_seconds']);
	    } elseif (!$read = XoopsCache::read('checkout-pull-svn') || $fontsvnConfigsList['schedule'] == 'cronjob') {
	        chdir($fontsvnConfigsList['svn_working_path'] . DS . 'json');
	        shell_exec("svn update --username=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_username'])) . " --password=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_password'])));
	        XoopsCache::write('seconds.'.basename(__FILE__), array('when' => microtime(true)), $fontsvnConfigsList['svn_pull_json_seconds']);
	    }
	}
		