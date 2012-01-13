<?php

/**
 * priority actions.
 *
 * @package    bugtracker
 * @subpackage priority
 * @author     Your name here
 */
class priorityActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->priorities = priorityQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new priorityForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new priorityForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $priority = priorityQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($priority, sprintf('Object priority does not exist (%s).', $request->getParameter('id')));
    $this->form = new priorityForm($priority);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $priority = priorityQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($priority, sprintf('Object priority does not exist (%s).', $request->getParameter('id')));
    $this->form = new priorityForm($priority);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $priority = priorityQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($priority, sprintf('Object priority does not exist (%s).', $request->getParameter('id')));
    $priority->delete();

    $this->redirect('priority/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $priority = $form->save();

      $this->redirect('priority/edit?id='.$priority->getId());
    }
  }
}
