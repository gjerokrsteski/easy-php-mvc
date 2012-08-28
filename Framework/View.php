<?php
class Framework_View
{
  /**
   * Path to the template
   * @var string
   */
  private $path = '_templates';

  /**
   * @var string Name of the template, in which case the default template.
   */
  private $template = 'default';

  /**
   * Contains the variables that are to be embedded in the template.
   * @var array
   */
  private $data = array();

  public function __construct()
  {
    $this->data = new ArrayObject(array(), ArrayObject::ARRAY_AS_PROPS);
  }

  /**
   * Is utilized for reading data from inaccessible properties.
   * @param string $name
   * @return mixed|null
   */
  public function __get($name)
  {
    if (array_key_exists($name, $this->data)) {
      return $this->data[$name];
    }

    $trace = debug_backtrace();
    trigger_error(
      'undefined property for the view: '
        . $name . ' at ' . $trace[0]['file']
        . ' line ' . $trace[0]['line'],
      E_USER_NOTICE
    );

    return null;
  }

  /**
   * Assigns a variable to a specific key.
   *
   * @param string $key The key.
   * @param mixed $value The Value.
   */
  public function assign($key, $value)
  {
    $this->data[$key] = $value;
  }

  /**
   * Sets the name of the template.
   *
   * @param string $template Name of the template.
   */
  public function setTemplate($template = 'default')
  {
    $this->template = $template;
  }

  /**
   * The template file upload and return.
   *
   * @return string The Output of the template.
   */
  public function loadTemplate()
  {
    // Path to the template and create check if the template exists.
    $file = $this->path . DIRECTORY_SEPARATOR . $this->template . '.phtml';

    if (file_exists($file)) {
      // The output of the script is stored in a buffer, ie not equal output.
      ob_start();

      // The template file is imported and stored in the output $output.
      include $file;
      $output = ob_get_contents();
      ob_end_clean();

      // Output return.
      return $output;
    }

    // Template file does not exist-> error message.
    return 'could not find template';
  }
}
