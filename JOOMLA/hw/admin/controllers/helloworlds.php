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
		//* get input
		$input = JFactory::getApplication()->input;
		//* get all info from input (in a arrary)
		$recs  = $input->get('cid', [], 'array');
		//* number of checked input
		$nrecs = $input->get('boxchecked', 0, 'int');
		//* get model
		$model = $this->getModel('HelloWorld', 'HelloWorldModel');
		//* message after delete 
		$msg = "$nrecs record(s) deleted";
		//* launch delete
		$model->delete($recs);
		
		JFactory::getApplication()->enqueueMessage($msg);

		$this->setRedirect(JRoute::_('index.php?option=com_helloworld', $msg));
	}
}