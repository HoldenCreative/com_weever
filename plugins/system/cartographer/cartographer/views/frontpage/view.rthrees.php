<?php
/*
*
*	Cartographer Content R3S Output Plugin for Joomla 1.5
*	(c) 2010-2011 Weever Inc. <http://www.weever.ca/>
*
*	Author: 	Robert Gerald Porter (rob.porter@weever.ca)
*	Version: 	0.8
*   License: 	GPL v3.0
*
*   This extension is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   (at your option) any later version.
*
*   This extension is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details <http://www.gnu.org/licenses/>.
* 
*
*  Original copyrights below this line
*  ===================================
*
** @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

require_once (JPATH_COMPONENT.DS.'view.php');
jimport( 'joomla.environment.uri' );

class R3SItemMap {

	public 		$type;
	public 		$description;
	public 		$name;
	public 		$datetime		= array("published"=>"","modified"=>"","start"=>"","end"=>"");
	public 		$image			= array("mobile"=>"","full"=>"");
	public 		$tags			= array();
	public 		$url;
	public 		$uuid;
	public 		$author;
	public 		$publisher;
	public 		$relationships;

}

class R3SChannelMap {

	public 		$thisPage;
	public 		$lastPage;
	public 		$count;
	public 		$type			= "htmlContent";
	public 		$sort;
	public 		$language		= "en-GB"; // fill in Joomla lang
	public 		$copyright;
	public 		$license;
	public 		$generator		= "Cartographer-Content for Joomla 1.5 v0.8";
	public 		$publisher;
	public 		$rating;
	public 		$url;
	public 		$description;
	public 		$name;
	public 		$r3sVersion		= "0.8";
	public 		$relationships;
	public 		$items;

}


/**
 * Frontpage View class
 *
 * @static
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class ContentViewFrontpage extends ContentView
{
	function display($tpl = null)
	{

		$mainframe = &JFactory::getApplication();

		//set data model
		$items =& $this->get('data' );

		$feed = new R3SChannelMap;
		
		$feed->count = count($items);
		$feed->thisPage = 1;
		$feed->lastPage = 1;
		$feed->sort = "normal";
		$feed->url = JURI::root()."index.php?".$_SERVER['QUERY_STRING'];
		$feed->description = ""; //nothing yet
		$feed->name;
		$feed->items = array();
		
		$feed->url = str_replace("?format=rthrees","",$feed->url);
		$feed->url = str_replace("format=rthrees","",$feed->url);
		
		
		foreach((array)$items as $v)
		{
			$v->image = null;

			$html = SimpleHTMLDomHelper::str_get_html($v->introtext);
			
			foreach(@$html->find('img') as $vv)
			{
				if($vv->src)
					$v->image = JURI::root().$vv->src;
			}
			
			if(!$v->image)
				$v->image = JURI::root()."media/com_weever/icon_live.png";
		
			$v->introtext = "";
			
			$feedItem = new R3SItemMap;
			
			$feedItem->type = "htmlContent";
			$feedItem->description = $v->introtext;
			$feedItem->name = $v->title;
			$feedItem->datetime["published"] = $v->created;
			$feedItem->datetime["modified"] = $v->modified;
			$feedItem->image["mobile"] = $v->image;
			$feedItem->image["full"] = $v->image;
			$feedItem->url = JURI::root()."index.php?option=com_content&view=article&id=".$v->id;
			$feedItem->author = $v->created_by;
			$feedItem->publisher = $mainframe->getCfg('sitename');
			
			$feedItem->url = str_replace("?format=rthrees","",$feedItem->url);
			$feedItem->url = str_replace("format=rthrees","",$feedItem->url);
			
			$feed->items[] = $feedItem;
		}

			 
		// Set the MIME type for JSON output.
		$document =& JFactory::getDocument();
		$document->setMimeEncoding( 'application/json' );
		
		header('Cache-Control: no-cache, must-revalidate');
		
		$callback = JRequest::getVar('callback');		

		$json = json_encode($feed);
		
		if($callback)
			$json = $callback . "(". $json .")";
		
		print_r($json);
		jexit();
		

	}


}
