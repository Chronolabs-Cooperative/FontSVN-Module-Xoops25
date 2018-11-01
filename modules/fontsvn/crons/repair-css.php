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
	
	
	$start = time();
	if ($staters = XoopsCache::read('seconds.'.basename(__FILE__)))
	{
	    $staters[] = $start;
	    sort($staters, SORT_ASC);
	    if (count($starters)>50)
	        unset($starters[0]);
	        sort($staters, SORT_ASC);
	        XoopsCache::write('seconds.'.basename(__FILE__), $staters, 3600 * 24 * 7 * 4 * 6);
	        $keys = array_keys($starters);
	        $avg = array();
	        foreach($starters as $key => $starting) {
	            if (isset($keys[$key - 1])) {
	                $avg[] = abs($starting - $starters[$keys[$key - 1]]);
	            }
	        }
	        if (count($avg) > 0 ) {
	            foreach($avg as $average)
	                $seconds += $average;
	                $seconds = $seconds / count($avg);
	        } else
	            $seconds = $fontsvnConfigsList['svn_repairing_css_seconds'] / 2.75;
	} else {
	    XoopsCache::write('seconds.'.basename(__FILE__), array(0=>$start), 3600 * 24 * 7 * 4 * 6);
	    $seconds = $fontsvnConfigsList['svn_repairing_css_seconds'] / 2.75;
	}
	
	if ($seconds < $fontsvnConfigsList['svn_repairing_css_seconds'] / 2.75)
	    $seconds = $fontsvnConfigsList['svn_repairing_css_seconds'] / 2.75;
	
	set_time_limit(8444);
	error_reporting(E_ERROR);
	ini_set('display_errors', true);
	
	$source = $fontsvnConfigsList['svn_working_path'] . DS . 'css';
	if (!$cssfiles = XoopsCache::read("css.files.".basename(__FILE__))) {
	    $cssfiles = getCompleteFilesListAsArray($source, array());
	    XoopsCache::write("css.files.".basename(__FILE__), $cssfiles, $seconds * 24 * 7 * 4);
	}
	if (count($cssfiles) == 0 || !is_array($cssfiles)) {
	    $cssfiles = getCompleteFilesListAsArray($source, array());
	    XoopsCache::write("css.files.".basename(__FILE__), $cssfiles, $seconds * 24 * 7 * 4);
	}

	shuffle($cssfiles);
	shuffle($cssfiles);
	shuffle($cssfiles);
	shuffle($cssfiles);
	
	if (is_dir($source)  && count($cssfiles) > 0) {
	    if (!($read = XoopsCache::read(basename(__FILE__))) || $fontsvnConfigsList['schedule'] == 'cronjob') {
	        XoopsCache::write(basename(__FILE__), array('when' => microtime(true)), $fontsvnConfigsList['svn_repairing_css_seconds']);
	        foreach($cssfiles as $key => $cssfile) {
	            if (time() - $start >= $seconds)
	                endRepairingCSS();

	            $css = file_get_contents($cssfile);
	            foreach(explode("||", $fontsvnConfigsList['svn_css_replace_paths']) as $replacefunc)
	                foreach(explode("==", $replacefunc) as $search => $replacement)
	                    $css = str_replace($search, $replacement, $css);
                foreach(explode("||", $fontsvnConfigsList['svn_css_removing']) as $search)
                    $css = str_replace($search, '', $css);
                if (md5_file($cssfile) != md5($css)) {
                    unlink($cssfile);
                    file_put_contents($cssfile, $css);
                    if (isset($_REQUEST['debug']))
                        echo "Normalising CSS in file: " . basename($cssfile) . "<br>\n";
                }
                unset($cssfiles[$key]);
                XoopsCache::write("css.files.".basename(__FILE__), $cssfiles, $seconds * 24 * 7 * 4);
                if (time() - $start >= $seconds)
                    endRepairingCSS();
	        }
	    }
	}
	
	endRepairingCSS();
	
	function endRepairingCSS() {
	    chdir($fontsvnConfigsList['svn_working_path'] . DS . 'css');
	    shell_exec("chmod -Rf 0777 .");
	    shell_exec("svn cleanup");
	    shell_exec("svn add --force . ");
	    shell_exec("svn commit --username=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_username'])) . " --password=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_password'])) . " -m 'CSS Modification for Normalisation: " . date('W, Y-m-d H:i:s') . "'");
	    shell_exec("svn update --username=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_username'])) . " --password=".str_replace("&", "\&", str_replace("|", "\|", $fontsvnConfigsList['svn_password'])));
	    exit(0);
	}