<?php
/*	
*	Weever Apps Administrator Component for Joomla
*	(c) 2010-2011 Weever Apps Inc. <http://www.weeverapps.com/>
*
*	Author: 	Robert Gerald Porter (rob.porter@weever.ca)
*	Version: 	1.1.2
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

if( comWeeverHelper::componentExists("com_k2") )
{

	$k2Options = "<option value='k2-cat'>".JText::_('WEEVER_ADD_DIR_FROM_K2_CATEGORY')."</option>
	<option value='k2-tags'>".JText::_('WEEVER_ADD_DIR_FROM_K2_TAGS')."</option>";

}
else 
{

	$k2Options = "<option value='' disabled='disabled'>K2 not installed, options unavailable</option>";

}

?>
<div class="wx-add-ui formspacer">
	<div class='wx-add-item-directory wx-add-item-dropdown'>
		<select id='wx-select-directory'>
			<option value='0'><?php echo JText::_('WEEVER_ADD_NEW_DIR_PARENTHESES'); ?></option>
			<option value='content-cat'><?php echo JText::_('WEEVER_ADD_DIR_FROM_JCATEGORY'); ?></option>
			<?php echo $k2Options; ?>
		</select>
	</div>
	
	<div class='wx-dummy wx-directory-dummy'>
		<select disabled='disabled'><option><?php echo JText::_('WEEVER_OPTIONS'); ?></option></select>
	</div>
	
	<div class='wx-dummy wx-directory-dummy'>
		<input type='text' disabled='disabled' placeholder='<?php echo JText::_('WEEVER_INPUT'); ?>' />
	</div>
	
	<div class='wx-add-item-option wx-directory-reveal wx-reveal'>

		<?php echo $this->directoryJCategoryDropdown;?>
		
		<?php echo $this->directoryK2CategoryDropdown;?>
		
		<div id="wx-add-directory-k2-tag">
		<input type='text' value='' id='wx-add-directory-k2-tag-input' class='wx-input wx-directory-input' name='unnamed' placeholder='<?php echo JText::_("WEEVER_K2_TAG_PLACEHOLDER"); ?>' />
		<label for='wx-add-directory-k2-tag-input' id='wx-add-directory-k2-tag-input-label' class='wx-directory-label'><?php echo JText::_('WEEVER_ADD_DIR_K2_TAG'); ?></label>
		</div>
	
	</div>
	
	<div class='wx-add-title wx-directory-reveal wx-reveal'>
	
		<input type='text' id='wx-directory-title' value='' class='wx-title wx-input wx-directory-input' name='noname' />
		<label for='wx-directory-title'><?php echo JText::_('WEEVER_DIR_TAB_NAME'); ?></label>
	</div>
	
	<div class='wx-add-submit'>
		<input type='submit' id='wx-directory-submit' class='wx-submit' value='<?php echo JText::_('WEEVER_ADD_DIR_SUBMIT'); ?>' name='add' disabled='disabled' />
	</div>
	
	

</div>