<?php
// no direct access
defined('_JEXEC') or die;

class modGiTagsArticleTags
{
	static function getTags(&$articleid, $count)
	{
		//get database
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query->select('DISTINCT t.name, t.tag_id');
		$query->from('#__gitags_tags t INNER JOIN #__gitags_items i ON t.tag_id=i.tag_id');
		$query->where("i.item_id=".$articleid);
		$query->order('t.name ASC');

		$db->setQuery($query, 0, intval($count));
		$rows = (array) $db->loadObjectList();

		$lists	= array();
		$i = 0;
		foreach ($rows as $row) {
			$lists[$i] = new stdClass;

      $lists[$i]->name = $row->name;
      $lists[$i]->id = $row->tag_id;

      $i++;
		}
		return $lists;
	}
}
