<?php
/**
 * @package    Joomla.Administrator
 * @subpackage com_helloworld
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorlds Controller
 * @since  0.0.1
 */
class HelloWorldControllerHelloWorlds extends JControllerLegacy {
    public function delete() {
		$input = JFactory::getApplication()->input;
		$id    = $input->get('id', 0, 'int');
		$msg   = "Delete successfully";

		if ($id == 0) {
            $msg = "An error occured ( ID equals 0 ).";
            $this->setRedirect(JRoute::_('index.php?option=com_helloworld', $msg));
        }

		$model = $this->getModel('HelloWorld', 'HelloWorldModel');
		$model->delete($id);
		
		JFactory::getApplication()->enqueueMessage($msg);

		$this->setRedirect(JRoute::_('index.php?option=com_helloworld', $msg));
	}
}