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


	require_once (__DIR__ . DIRECTORY_SEPARATOR . 'header.php');
	
	global $fontsvnConfigsList;
	
	if ($GLOBALS['fontsvnConfigsList']['htaccess']) {
		if (!strpos(XOOPS_URL.'/'.$GLOBALS['fontsvnConfigsList']['base'].'/uploads.html', $_SERVER['REQUEST_URI'])) {
			header('Location: ' . XOOPS_URL.'/'.$GLOBALS['fontsvnConfigsList']['base'].'/uploads.html');
			exit(0);
		}
	}
	
	xoops_load('XoopsCache');
	if (!$data = XoopsCache::read($cachekey = _MD_FONTSVN_MODULE_DIRNAME . "-form-uploading"))
	{
		// API Load Balancing
		if ($fontsvnConfigsList['api_min_sleep']>0 && $fontsvnConfigsList['api_max_sleep']>0 && $fontsvnConfigsList['api_min_sleep']<$fontsvnConfigsList['api_max_sleep'])
			sleep(mt_rand($fontsvnConfigsList['api_min_sleep'], $fontsvnConfigsList['api_max_sleep']));
		// Calls API
		$data = array('html'=>fontsvn_getURIData(str_replace("%apipath%", $fontsvnConfigsList['api_path'], $fontsvnConfigsList['api_path_uploads_form']), array('return' => XOOPS_URL.'/'.$GLOBALS['fontsvnConfigsList']['base'].'/uploads.html')));
		if (!empty($data) && $fontsvnConfigsList['cache_forms'] > 0)
		{
			XoopsCache::write($cachekey, $data, $fontsvnConfigsList['cache_forms']);
			$caches = XoopsCache::read(_MD_FONTSVN_MODULE_DIRNAME . "-caches-session");
			if (!is_array($caches))
				$caches = array();
			$caches[$cachekey] = time() + $fontsvnConfigsList['cache_forms'];
			XoopsCache::write(_MD_FONTSVN_MODULE_DIRNAME . "-caches-session", $caches, 60*60*24*90*128);
		}
	}
	
	$xoopsOption['template_main'] = 'fontsvn_uploads.html';
	include $GLOBALS['xoops']->path('/header.php');		
	$GLOBALS['xoTheme']->addScript(XOOPS_URL . "/browse.php?Frameworks/jquery/jquery.js");
	$GLOBALS['xoTheme']->addScript(XOOPS_URL . "/browse.php?Frameworks/jquery/jquery.ui.js");
	$GLOBALS['xoTheme']->addStylesheet(XOOPS_URL . "/modules/" . _MD_FONTSVN_MODULE_DIRNAME . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/style.css');
	$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', _MN_FONTSVN_UPLOADING_PAGETITLE);
	$GLOBALS['xoopsTpl']->assign('form', $data['html']);
	include $GLOBALS['xoops']->path('/footer.php');		
	exit(0);
		
?>
