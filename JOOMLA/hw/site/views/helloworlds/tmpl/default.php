<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<button type="submit">
    <a href="index.php?option=com_helloworld&view=helloworld&layout=helloworld.edit&id=0" style="color: white;">+ New</a>
</button>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th width="3%"><?php echo JText::_('COM_NUM'); ?></th>
            <th width="90%">
                <?php echo JText::_('COM_NAME') ;?>
            </th>
            <th width="2%">
                <?php echo JText::_('COM_HELLOWORLD_ID'); ?>
            </th>
            <th width="5%">
                Options
            </th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="5">
                <?php echo $this->pagination->getListFooter(); ?>
            </td>
        </tr>
    </tfoot>
    <tbody>
        <?php if (!empty($this->items)) : ?>
            <?php foreach ($this->items as $i => $row) :
                $link = JRoute::_('index.php?option=com_helloworld&view=helloworld&layout=helloworld.edit&id=' . $row->id);
            ?>
                <tr>
                    <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                    <td>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_HELLOWORLD_EDIT_HELLOWORLD'); ?>">
                            <?php echo $row->greeting; ?>
                        </a>
                    </td>
                    <td align="center">
                        <?php echo $row->id; ?>
                    </td>
                    <td align="center">
                        <form action="<?php echo JRoute::_('index.php?option=com_helloworld&id=' . (int) $row->id); ?>" method="post" name="deleteForm" id="deleteForm">
                            <input type="hidden" name="task" value="helloworlds.delete" />
                            <input type="submit" value="delete">
                            <?php echo JHtml::_('form.token'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>