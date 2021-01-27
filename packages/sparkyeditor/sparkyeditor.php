<?php
/*------------------------------------------------------------------------
# "Responsive Lightbox" Joomla plugin
# Copyright (C) 2015 HotThemes. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: HotJoomlaTemplates.com
# Website: http://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

use Joomla\CMS\Factory;

// jimport('joomla.plugin.plugin');

class plgContentSparkyEditor extends JPlugin
{

	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		
		// // checking if the page content is edited by the Sparky Editor
		// if (strpos($article->text, 'sparky_page_content') === false) {
		// 	return true;
		// }
		
		// // adding CSS and JS in head
		// $doc = JFactory::getDocument();
		
		// // add your stylesheet
		// $doc->addStyleSheet( JURI :: base().'plugins/content/sparkyeditor/css/sparky_frontend.css' );

		/** @var HtmlDocument $doc */
		$doc = Factory::getApplication()->getDocument();
		$lang = Factory::getApplication()->getLanguage();
		$direction = $lang->get('rtl');
		$wa  = $doc->getWebAssetManager();

		// Add assets
		$wa->registerAndUseStyle('plg_content_sparkyeditor', 'plg_editors_sparky/sparky_frontend.css')
		   ->registerAndUseScript('plg_content_sparkyeditor', 'plg_editors_sparky/sparky_frontend.js')
		;
		
		// inline style declaration
		if ($direction) {
			$doc->addStyleDeclaration( '
.sparky_page_container {
	flex-direction: row-reverse;
}
			' );
		}
		
	}
}