<?php
/**
 * System Preloads
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author      Simon Roberts (AKA +61405130385)
 * @version     $Id: xortify.php 8066 2011-11-06 05:09:33Z beckmi $
 */

defined('XOOPS_ROOT_PATH') or die('Restricted access');

class FontsvnSvnPreload extends XoopsPreloadItem
{

	
    function eventCoreIncludeCommonEnd($args)
    {
        global $fontsvnModule, $fontsvnConfigsList, $fontsvnConfigs, $fontsvnConfigsOptions;
        require_once dirname(__DIR__) . DS . 'header.php';
        if ($fontsvnConfigsList['schedule'] == 'preloaders')
            include dirname(__DIR__) . DS . 'crons' . DS . 'pair-json.php';
        if ($fontsvnConfigsList['schedule'] == 'preloaders')
            include dirname(__DIR__) . DS . 'crons' . DS . 'pair-css.php';
    }
    
	function eventCoreFooterEnd($args)
	{
	    global $fontsvnModule, $fontsvnConfigsList, $fontsvnConfigs, $fontsvnConfigsOptions;
	    if ($fontsvnConfigsList['schedule'] == 'preloaders')
	        include dirname(__DIR__) . DS . 'crons' . DS . 'repair-css.php';
	    if ($fontsvnConfigsList['schedule'] == 'preloaders')
	        include dirname(__DIR__) . DS . 'crons' . DS . 'compare-json.php';
        if ($fontsvnConfigsList['schedule'] == 'preloaders')
            include dirname(__DIR__) . DS . 'crons' . DS . 'verify-svn.php';
	}
}

?>
