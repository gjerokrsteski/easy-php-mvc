<?php
abstract class Framework_Controller
{
  protected $request  = null;
  protected $action   = null;
  protected $view     = null;

  /**
   * @param array $request Array from $_GET & $_POST.
   */
  public function __construct(array $request)
  {
    $this->view    = new Framework_View();
    $this->request = new ArrayObject($request, ArrayObject::ARRAY_AS_PROPS);
    $this->action  = !empty($request['action']) ? $request['action'] : 'default';
  }

  /**
   * Method to show the content.
   *
   * @return Framework_View
   */
  public function render()
  {
    $action = strtolower($this->action).'Action';
    $view = call_user_func(array($this, $action));

    return $view;
  }
}