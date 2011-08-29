<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<span class="tags">Topics: 
<?php 
  $i=0;
  foreach ($tags as $tag) {
    $attribs['rel'] = "tag nofollow";
    $formattedName = str_replace(" ", "+", substr($tag->name, 0, 20));
    $link = JRoute::_('index.php?option=com_search&searchword='.trim($formattedName) . '&areas[]=gitags', $attribs);  
    echo JHTML::link($link, $tag->name);
    if (++$i<count($tags)) echo ', ';
  }
?>
</span>