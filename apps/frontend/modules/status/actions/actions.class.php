<?php

/**
 * status actions.
 *
 * @package    bugtracker
 * @subpackage status
 * @author     Your name here
 */
class statusActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->status = statusQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->status = StatusPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->status);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new statusForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new statusForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $status = statusQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($status, sprintf('Object status does not exist (%s).', $request->getParameter('id')));
    $this->form = new statusForm($status);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $status = statusQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($status, sprintf('Object status does not exist (%s).', $request->getParameter('id')));
    $this->form = new statusForm($status);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $status = statusQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($status, sprintf('Object status does not exist (%s).', $request->getParameter('id')));
    $status->delete();

    $this->redirect('status/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $status = $form->save();

      $this->redirect('status/edit?id='.$status->getId());
    }
  }
}
