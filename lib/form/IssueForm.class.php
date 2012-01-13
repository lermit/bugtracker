<?php

/**
 * Issue form.
 *
 * @package    bugtracker
 * @subpackage form
 * @author     Your name here
 */
class IssueForm extends BaseIssueForm
{
  public function configure()
  {
    // Order drop down list by priority.position field
    $this->widgetSchema['priority_id']->setOption('order_by', array('Position', 'ASC'));

    
  }
}
