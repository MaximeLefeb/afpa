<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorlds View
 * @since 0.0.1
 */
class HelloWorldViewHelloWorlds extends JViewLegacy {
	/**
	 * Display the Hello World view
	 * @param string $tpl The name of the template file to parse; automatically searches through the template paths.
	 * @return void
	 */
	public function display($tpl = null) {
        $document = JFactory::getDocument();
        $document->addStyleSheet("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");

		$this->items	  = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		parent::display($tpl);
	}
}