<?php

/*	
*	Weever Apps Administrator Component for Joomla
*	(c) 2010-2011 Weever Apps Inc. <http://www.weeverapps.com/>
*
*	Author: 	Robert Gerald Porter (rob.porter@weever.ca)
*	Version: 	1.0
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

$option = JRequest::getCmd('option');
JHTML::_('behavior.mootools');
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');

$document = &JFactory::getDocument();

$document->addScript( JURI::base(true).'/components/com_weever/assets/js/jquery.js' );
$document->addCustomTag ('<script type="text/javascript">jQuery.noConflict();</script>');

$document->addScript( JURI::base(true).'/components/com_weever/assets/js/jquery-ui.js' );
$document->addScript( JURI::base(true).'/components/com_weever/assets/js/jquery-impromptu.js' );
$document->addScript( JURI::base(true).'/components/com_weever/assets/js/weever.js' );


	
$document->addScript( JURI::base(true).'/components/com_weever/assets/js/config.js' );

$pane = &JPane::getInstance('tabs');

$plugin_html_enabled = "";
$plugin_html_disabled = "";

if(!$this->site_key)
{

	JError::raiseNotice(100, JText::_('WEEVER_NOTICE_NO_SITEKEY'));

}

$onlineSpan = "";
$offlineSpan = "";

if($this->appEnabled)
{
	$offlineSpan = 'class="wx-app-hide-status"';
	$offlineStatusClass = "";
}
else 
{
	$onlineSpan = 'class="wx-app-hide-status"';
	$offlineStatusClass = "class=\"wx-app-status-button-offline\"";
}

?>


<!-- THIS INFO IS FOR BASIC CUSTOMERS -->
<div style="position:absolute; right:64px; top:136px; margin:0 1em;">
<span style="float: right; font-size: 10px;">• Mobile GPS Maps!<br>• Rebrand &amp; Resell<br>• Custom Domains</span>
<span style="float:right; line-height: 1.25em; font-size: 1em; text-align: right; margin:1px 1.5em 0 0;">Weever Apps Pro &amp; Premium<br><a id="headerbutton" href="http://weeverapps.com/pricing">Learn more</a></span></div>


<!-- THIS INFO IS FOR TRIAL CUSTOMERS -->
<span style="font-size: 1.5em; position: absolute; right: 64px; line-height: 1.25em; min-width: 348px; text-align: left; margin: 0pt; top: 136px;"><a href="http://weeverapps.com/pricing" style="float: left; margin: 0pt 1em;" id="headerbutton">Sign Up</a>Enjoying Your Free Trial?<br><span style="font-size: 0.5em; margin: 0pt;">We add powerful new features each month.</span></span>


<span id="wx-admin-topbar-left" class="wx-admin-topbar">
			<a href="http://weeverapps.com/pricing">Plans &amp; Pricing</a> &nbsp; | &nbsp; <a href="http://twitter.com/weeverapps">Follow us on Twitter</a> &nbsp; | &nbsp; <a href="http://eepurl.com/fP-oD">Newsletter</a>

</span>
    

<div id="wx-admin-topbar-right" class="wx-admin-topbar">

<span class="wx-app-status-button-offline" id="wx-app-status-button">
    
  <span class="wx-app-hide-status" id="wx-app-status-online">
	<span id="wx-status-current">Status &mdash; App is</span>
    <span id="wx-status-boldonline"><strong>online</strong></span>
    <span id="wx-status-current">for mobile visitors &mdash;</span>
	<span id="wx-status-takeoffline"><a href="http://localhost/2011_11_Wordpress/wp-admin/admin.php?page=weever-list&amp;weever-app-enabled=0">Take App Offline</a></span>
  </span>
    
  <span id="wx-app-status-offline">
    <span id="wx-status-current">Status &mdash; App is</span>
    <span id="wx-status-boldoffline"><strong>offline</strong></span>
    <span id="wx-status-current">for mobile visitors &mdash;</span>
	<span id="wx-status-turnonline"><a href="http://localhost/2011_11_Wordpress/wp-admin/admin.php?page=weever-list&amp;weever-app-enabled=1">Turn App Online</a></span>
  </span>

</span>
</div>

<div id='wx-modal-loading'>
    <div id='wx-modal-loading-text'></div>
    <div id='wx-modal-secondary-text'></div>
    <div id='wx-modal-error-text'></div>
</div>


<form action='index.php' enctype='multipart/form-data' method='post' name='adminForm' id='adminForm'>
	

	
	<?php echo $pane->startPane('theme'); ?>
	<?php echo $pane->startPanel(JText::_("WEEVER_BASIC_SETTINGS"), 'basic-settings'); ?>
	<div>
	
	
	
		<fieldset class='adminForm'><legend><?php echo JText::_('WEEVER_CONFIG_SIMPLE_DEVICE_SETTINGS'); ?></legend>
			
		<table class="admintable">
		
		<tr><td class="key hasTip" title="<?php echo JText::_('WEEVER_ENABLE_SMARTPHONES_TOOLTIP'); ?>"><?php echo JText::_('WEEVER_CONFIG_ENABLE_SMARTPHONES_Q'); ?></td>
		<td>
		<select name="DetectTierWeeverSmartphones">
		<option value="0"><?php echo JText::_('NO'); ?></option>
		<option value="1" <?php echo $this->DetectTierWeeverSmartphones; ?>><?php echo JText::_('YES'); ?></option>
		</select>
		</td>
		</tr>
		
		<tr><td class="key hasTip" title="<?php echo JText::_('WEEVER_ENABLE_TABLETS_TOOLTIP'); ?>"><?php echo JText::_('WEEVER_CONFIG_ENABLE_TABLETS_AND_IPADS_Q'); ?></td>
		<td>
		<select name="DetectTierWeeverTablets">
		<option value="0"><?php echo JText::_('NO'); ?></option>
		<option value="1" <?php echo $this->DetectTierWeeverTablets; ?>><?php echo JText::_('YES'); ?></option>
		</select>
		</td>
		</tr>
		
		</table>
		
		</fieldset>
	
	
	
	
	<fieldset class='adminForm'>
	<legend><?php echo JText::_('WEEVER_CONFIG_ADDITIONAL_SERVICES'); ?></legend>

	<table class="admintable">
	
	<tr>
	<td class="key hasTip" title="<?php echo JText::_("WEEVER_GOOGLE_ANALYTICS_TOOLTIP"); ?>"><?php echo JText::_('WEEVER_GOOGLE_ANALYTICS_UA_CODE'); ?></td>
	<td><input type="textbox" name="google_analytics" value="<?php echo $this->google_analytics; ?>" id="wx-google-analytics-input" placeholder="UA-XXXXXX-XX" /></td>	
	</tr>
	
	<tr>
	<td class="key hasTip" title="<?php echo JText::_("WEEVER_ECOSYSTEM_TOOLTIP"); ?>"><?php echo JText::_('WEEVER_ECOSYSTEM'); ?></td>
	<td><input type="checkbox" name="ecosystem" value="1" <?php echo ($this->ecosystem == 1 ? "checked='checked'":""); ?>" /> <label for="checkEcosystem"><?php echo JText::_('WEEVER_ECOSYSTEM_ENABLE'); ?></label></td>	
	</tr>
	


	</table>
	
	</fieldset>


	
	<fieldset class='adminForm'>
	<legend><?php echo JText::_('WEEVER_CONFIG_PRO_FEATURES'); ?></legend>

	<p><?php echo JText::_("WEEVER_DOMAIN_MAPPING_INSTRUCTIONS"); ?></p>

	<table class="admintable">
	
	<tr>
	<td class="key hasTip" title="<?php echo JText::_("WEEVER_DOMAIN_MAPPING_TOOLTIP"); ?>"><?php echo JText::_('WEEVER_DOMAIN_MAPPING'); ?></td>
	<td><input type="textbox" name="domain"  value="<?php echo $this->domain; ?>" id="wx-domain-map-input" placeholder="app.yourdomain.com" /> </td>	
	</tr>
	
	<tr>
	<td class="key hasTip" title="<?php echo JText::_("WEEVER_LOADING_SPINNER_TOOLTIP"); ?>"><?php echo JText::_('WEEVER_LOADING_SPINNER_TEXT'); ?></td>
	<td><textarea type="textbox" name="loadspinner" id="wx-load-spinner" placeholder="<?php echo JText::_("WEEVER_LOADING_SPINNER_PLACEHOLDER"); ?>"><?php echo htmlspecialchars($this->loadspinner); ?></textarea> </td>	
	</tr>	

	
	</table>
	
	</fieldset>


	
		</div>
		
			<?php echo $pane->endPanel(); ?>
			<?php echo $pane->startPanel(JText::_("WEEVER_ADVANCED_DEVICE_SETTINGS_TAB"), 'advanced-settings'); ?>
		<div>
	
		<fieldset class='adminForm'><legend><?php echo JText::_('WEEVER_CONFIG_ADVANCED_DEVICE_SETTINGS'); ?></legend>
		
		<div style="margin-left:1em;"><input type="checkbox" value="1" class="wx-check" name="granular_devices" id="wx-granular-devices" <?php echo $this->granular; ?> /><label class="wx-check-label" for="wx-granular-devices"><?php echo JText::_('WEEVER_CONFIG_USE_ADVANCED_DEVICE_SETTINGS'); ?></label></div>
		
		<table class="admintable">
		
		<tr><th>&nbsp;</th>
		<th><?php echo JText::_('WEEVER_CONFIG_FORWARING'); ?></th>
		<th><?php echo JText::_('WEEVER_CONFIG_RECOMMENDED'); ?></th>
		<th><?php echo JText::_('WEEVER_CONFIG_COMPATIBILITY_GRADE'); ?></th></tr>
		

		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_APPLE_IPOD_IPHONE'); ?></td>
		<td>
		<select name="DetectIphoneOrIpod">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectIphoneOrIpod; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_APPLE_IPOD_IPHONE_GRADE'); ?></td>
		</tr>
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_GOOGLE_ANDROID'); ?></td>
		<td>
		<select name="DetectAndroid">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectAndroid; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_GOOGLE_ANDROID_GRADE'); ?></td>
		</tr>
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_BLACKBERRY_SIX_TOUCH'); ?></td>
		<td>
		<select name="DetectBlackBerryTouch">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectBlackBerryTouch; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_BLACKBERRY_SIX_TOUCH_GRADE'); ?></td>
		</tr>
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_HP_TOUCHPAD'); ?></td>
		<td>
		<select name="DetectWebOSTablet">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectTouchPad; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_HP_TOUCHPAD_GRADE'); ?></td>
		</tr>
		
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_BLACKBERRY_PLAYBOOK'); ?></td>
		<td>
		<select name="DetectBlackBerryTablet">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectBlackBerryTablet; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_BLACKBERRY_PLAYBOOK_GRADE'); ?></td>
		</tr>
		
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_APPLE_IPAD'); ?></td>
		<td>
		<select name="DetectIpad">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectIpad; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_APPLE_IPAD_GRADE'); ?></td>
		</tr>
		
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_GOOGLE_ANDROID_TABLETS'); ?></td>
		<td>
		<select name="DetectAndroidTablet">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectAndroidTablet; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_GOOGLE_ANDROID_TABLETS_GRADE'); ?></td>
		</tr>
		

		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_GOOGLE_TV'); ?></td>
		<td>
		<select name="DetectGoogleTV">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectGoogleTV; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_GOOGLE_TV_GRADE'); ?></td>
		</tr>
		
		<tr><td class="key"><?php echo JText::_('WEEVER_CONFIG_APPLETV_TWO_JAILBROKEN'); ?></td>
		<td>
		<select name="DetectAppleTVTwo">
		<option value="0"><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></option>
		<option value="1" <?php echo $this->DetectAppleTVTwo; ?>><?php echo JText::_('WEEVER_CONFIG_ENABLED'); ?></option>
		</select>
		</td>
		<td><?php echo JText::_('WEEVER_CONFIG_DISABLED'); ?></td>
		<td><?php echo JText::_('WEEVER_CONFIG_APPLETV_TWO_JAILBROKEN_GRADE'); ?></td>
		</tr>
		
		</table>
		
		</fieldset>
		</div>
		
	<?php echo $pane->endPanel(); ?>
	<?php echo $pane->endPane(); ?>

	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="app_enabled" value="<?php echo $this->app_enabled; ?>" />
	<input type="hidden" name="site_key" id="wx-site-key" value="<?php echo $this->site_key; ?>" />
	<input type="hidden" name="view" value="config" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_('form.token'); ?>
	 
</form>