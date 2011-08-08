<?php
/*	
*	Weever Apps Administrator Component for Joomla
*	(c) 2010-2011 Weever Apps Inc. <http://www.weeverapps.com/>
*
*	Author: 	Robert Gerald Porter (rob.porter@weever.ca)
*	Version: 	0.9
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


defined('_JEXEC') or die;
jimport('joomla.application.component.helper');

class comWeeverThemeStylesObj
{
	
	public 		$aLink;
	public 		$spanLogo;
	public 		$contentButton;
	public 		$border;	
	public 		$fontType;
	public 		$blogIcon;
	public 		$pagesIcon;
	public 		$contactIcon;
	public 		$socialIcon;
	public 		$videoIcon;
	public 		$photoIcon;
	public 		$mapIcon;
	public 		$titlebarHtml;
	public 		$titlebarSource		= "text";
	public 		$template			= "sencha";
	public 		$useCssOverride;
	public 		$useCustomIcons;
	
}