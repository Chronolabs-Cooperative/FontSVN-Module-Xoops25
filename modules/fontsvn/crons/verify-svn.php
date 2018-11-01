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
	        $keys = array_key($starters);
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
	            $seconds = 1800;
	} else {
	    XoopsCache::write('seconds.'.basename(__FILE__), array(0=>$start), 3600 * 24 * 7 * 4 * 6);
	    $seconds = 1800;
	}
	
	set_time_limit(8444);
	$start = time();
	global $fontsvnModule, $fontsvnConfigsList, $fontsvnConfigs, $fontsvnConfigsOptions;
	
	$identityHandler = xoops_getModuleHandler('identities', _MD_FONTSVN_MODULE_DIRNAME);
	$indexesHandler= xoops_getModuleHandler('indexes',_MD_FONTSVN_MODULE_DIRNAME);
	$source = $fontsvnConfigsList['svn_working_path'] . DS . 'json';
	if (is_dir($source)  && count(XoopsLists::getDirListAsArray($source)) > 0) {
	    if (!($read = XoopsCache::read(basename(__FILE__))) || $fontsvnConfigsList['schedule'] == 'cronjob') {
	        XoopsCache::write(basename(__FILE__), array('when' => microtime(true)), $fontsvnConfigsList['svn_import_json_seconds']);
	        $structures = json_decode(file_get_contents($source . DS . 'structures.json'), true);
	        foreach($structures as $structure) {
	            if (time() - $start >= $seconds)
	                exit(0);
	            if (strlen($structure['meter']) == 3 && $structure['type'] == 'fonts') {
	                $fonts = json_decode(file_get_contents(str_replace("json//json", "json", $source . DS . $structure['path']) . DS . $structure['filename']), true);
	                foreach($fonts as $font) {
	                    if (time() - $start >= $seconds)
	                        exit(0);
	                    if (!empty($font['key'])) {
	                        if ($identityHandler->getCount(new Criteria('identity', $font['key'])) == 0) {
	                            if (isset($_REQUEST['debug']))
	                                echo "\n<br/>Creating Font: " . $font['key'] . " ~ " . $font['fullname'];
	                            $identity = $identityHandler->create();
	                            $identity->setVar('identity', $font['key']);
	                            $identity->setVar('base', substr($structure['meter'], 0, 1));
	                            $identity->setVar('second', substr($structure['meter'], 0, 2));
	                            $identity->setVar('thirds', substr($structure['meter'], 0, 3));
	                            $identity->setVar('name', $font['fullname']);
	                            $identity->setVar('tags', str_replace(" ", ",", $font['fullname']));
	                            $identity->setVar('barcode', $font['barcode']);
	                            $identity->setVar('referee', substr($font['barcode'], mt_rand(0, 3), mt_rand(5, 8)));
	                            $identity->setVar('filename', $font['filename']);
	                            $fontfiles = $fontglyphs = $glyphbuffer = array();
	                            foreach($structures as $structureb) {
	                                if (!count($fontfiles) && strlen($structureb['meter']) == 3 && $structureb['meter'] == $structure['meter'] && $structureb['type'] == 'files') {
	                                    $fontfiles = json_decode(file_get_contents(str_replace("json//json", "json", $source . DS . $structureb['path']) . DS . $structureb['filename']), true);
	                                } elseif (!count($fontglyphs) && strlen($structureb['meter']) == 3 && $structureb['meter'] == $structure['meter'] && $structureb['type'] == 'glyphs') {
	                                    $fontglyphs = json_decode(file_get_contents(str_replace("json//json", "json", $source . DS . $structureb['path']) . DS . $structureb['filename']), true);
	                                }
	                            }       

	                            foreach($fontfiles as $filenames => $resfiles) {
	                                foreach($resfiles as $filename => $resfile) {
	                                    if ($resfile['key'] == $font['key'])
    	                                {
    	                                    switch($resfile['extension']) {
    	                                        case "css":
    	                                            $identity->setVar('css', sprintf($fontsvnConfigsList['svn_raw_path'], $resfile['path'] . "/" . $filename));
    	                                            break;
    	                                        case "naming.png":
    	                                            $identity->setVar('naming', sprintf($fontsvnConfigsList['svn_raw_path'], $resfile['path'] . "/" . $filename));
    	                                            break;
    	                                        case "preview.png":
    	                                            $identity->setVar('preview', sprintf($fontsvnConfigsList['svn_raw_path'], $resfile['path'] . "/" . $filename));
    	                                            break;
    	                                    }
    	                                }
	                                }
	                            }
	                            
	                            foreach($fontglyphs as $chars => $glyphs) {
	                                foreach($glyphs as $char => $glyph) {
    	                                if ($glyph['key'] == $font['key']) 
    	                                    foreach($fontfiles as $filenames => $resfiles) {
    	                                        foreach($resfiles as $filename => $resfile) {
    	                                            if ($resfile['key'] == $font['key'] && $resfile['key'] == $glyph['key']) {
    	                                                if ($resfile['extension'] == 'png' && substr($resfile['filename'], 0, strlen($glyph['unicode'])) == $glyph['unicode']) {
    	                                                    $filebase = getURIData(sprintf($fontsvnConfigsList['svn_raw_path'], $resfile['path'] . "/"), 45, 45, array());
    	                                                    if (strpos($filebase, $resfile['filename']))
            	                                               $glyphbuffer[$glyph['unicode']][$char] = sprintf($fontsvnConfigsList['svn_raw_path'], $resfile['path'] . "/" . $resfile['filename']);
            	                                        }
    	                                            }
    	                                        }
    	                                    }
	                                }
	                            }	                            
	                            $identity->setVar('glyphs', $glyphbuffer);
	                            $identity->setVar('created', time());
	                            if ($id = $identityHandler->insert($identity, true))
	                            {
	                                if ($fontsvnConfigsList['tags'] && file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'tag' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'tag.php'))
	                                {
	                                    $tag_handler = xoops_getmodulehandler('tag', 'tag');
	                                    $tag_handler->updateByItem($identity->getVar('tags'), $id, basename(dirname(__DIR__)), 0);
	                                }
	                                $criteria = new Criteria('base', $identity->getVar('base'));
	                                if ($indexesHandler->getCount($criteria) == 0)
	                                {
	                                    $index = $indexesHandler->create();
	                                    $index->setVar('base', $identity->getVar('base'));
	                                    $indexesHandler->insert($index, true);
	                                }
	                                $index = $indexesHandler->getByBase($identity->getVar('base'));
	                                if (is_a($index, 'fontsvnIndexes'))
	                                    $index->addFontID($id);
                                    else
                                        die('Missing Index for Base: '.$identity->getVar('base'));
                                    $first_id = $indexesHandler->insert($index, true);
                                    $criteria = new Criteria('base', $identity->getVar('second'));
                                    if ($indexesHandler->getCount($criteria) == 0)
                                    {
                                        $index = $indexesHandler->create();
                                        $index->setVar('base', $identity->getVar('second'));
                                        $index->setVar('parent_id', $first_id);
                                        $indexesHandler->insert($index, true);
                                    }
                                    $index = $indexesHandler->getByBase($identity->getVar('second'));
                                    if (is_a($index, 'fontsvnIndexes'))
                                        $index->addFontID($id);
                                    else
                                        die('Missing Index for Base: '.$identity->getVar('second'));
                                    $second_id = $indexesHandler->insert($index, true);
                                    $criteria = new Criteria('base', $identity->getVar('thirds'));
                                    if ($indexesHandler->getCount($criteria) == 0)
                                    {
                                        $index = $indexesHandler->create();
                                        $index->setVar('base', $identity->getVar('thirds'));
                                        $index->setVar('parent_id', $second_id);
                                        $indexesHandler->insert($index, true);
                                    }
                                    $index = $indexesHandler->getByBase($identity->getVar('thirds'));
                                    if (is_a($index, 'fontsvnIndexes'))
                                        $index->addFontID($id);
                                    else
                                        die('Missing Index for Base: '.$identity->getVar('thirds'));
                                    $third_id = $indexesHandler->insert($index, true);
	                            }
	                        }
	                    }
	                    if (time() - $start >= $seconds)
	                        exit(0);
	                }
	            }
	        }
	    }
	}