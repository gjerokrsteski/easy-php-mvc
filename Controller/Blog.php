<?php
class Controller_Blog extends Framework_Controller
{
  /**
   * Overwrites - the method to show the content.
   *
   * @return string Content of the application.
   */
  public function render()
  {
    $view = parent::render();

    $this->view->setTemplate('theblog');
    $this->view->assign('blog_title', 'Der Titel des Blogs');
    $this->view->assign('blog_content', $view->loadTemplate());
    $this->view->assign('blog_footer', 'Ein Blog von und mit MVC');

    return $this->view->loadTemplate();
  }

  public function defaultAction()
  {
    $view = new Framework_View();
    $entries = Models_Blog::getEntries();
    $view->setTemplate('default');
    $view->assign('entries', $entries);

    return $view;
  }

  public function showentryAction()
  {
    $view = new Framework_View();
    $view->setTemplate('entry');

    $entryid = $this->request['id'];
    $entry   = Models_Blog::getEntry($entryid);

    $view->assign('title', $entry['title']);
    $view->assign('content', $entry['content']);

    return $view;
  }
}