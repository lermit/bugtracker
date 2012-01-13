<?php

/**
 * issue actions.
 *
 * @package    bugtracker
 * @subpackage issue
 * @author     Your name here
 */
class issueActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Issues = IssueQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new IssueForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new IssueForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Issue = IssueQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Issue, sprintf('Object Issue does not exist (%s).', $request->getParameter('id')));
    $this->form = new IssueForm($Issue);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Issue = IssueQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Issue, sprintf('Object Issue does not exist (%s).', $request->getParameter('id')));
    $this->form = new IssueForm($Issue);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Issue = IssueQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Issue, sprintf('Object Issue does not exist (%s).', $request->getParameter('id')));
    $Issue->delete();

    $this->redirect('issue/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Issue = $form->save();

      $this->redirect('issue/edit?id='.$Issue->getId());
    }
  }
}
