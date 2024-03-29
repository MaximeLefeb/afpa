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
 * HTML View class for the HelloWorld Component
 * @since 0.0.1
 */
class HelloWorldViewHelloWorld extends JViewLegacy {
	/**
	 * View form
	 * @var form
	 */
	protected $form = null;

	/**
	 * Display the Hello World view
	 * @param string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 * @return void
	 */
	function display($tpl = null) {
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Display the view
		parent::display($tpl);
	}
}