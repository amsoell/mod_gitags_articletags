<?php
/**
 * @version		$Id: mod_footer.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';

$app		= JFactory::getApplication();
$articleid = $params->get('articleid');
$count = $params->get('count');

if (!($articleid>0)) {
  //article not specified. Try to get it from the context;
  if(JRequest::getVar('view', 0) == "article"){
    $db = &JFactory::getDBO();
    $articleid=explode(":",JRequest::getVar('id',0));
    $articleid = $articleid[0];
  } else {
    exit;
  }  
}

$tags = &modGiTagsArticleTags::getTags($articleid, $count);
require JModuleHelper::getLayoutPath('mod_gitags_articletags', $params->get('layout', 'default'));
