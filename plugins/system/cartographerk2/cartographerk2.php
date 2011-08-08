<?php
/*
*
*	Cartographer for K2 R3S Output Plugin for Joomla 1.5
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
*/


defined('_JEXEC') or die();

jimport('joomla.plugin.plugin');

class plgSystemCartographerK2 extends JPlugin
{
	
	public function plgSystemCartographerK2(& $subject, $config)
	{
	
		parent::__construct($subject, $config);
	
	}
	
	public function onAfterRoute()
	{
	
		$format = JRequest::getWord('format');
		$app = JFactory::getApplication();
		
	    if(	'com_k2' == JRequest::getCMD('option') 
	    		&& !$app->isAdmin()
	    		&&	$format == "rthrees") 
	    {
	    	require_once(dirname(__FILE__) . DS . 'cartographerk2' . DS . 'controller.php');
	    }
	
	
	}

}