<?php
// incorporate our classes.
include('Framework/Controller.php');
include('Framework/View.php');
include('Controller/Blog.php');
include('Models/Blog.php');

// create controller.
$controller = new Controller_Blog($_GET);

// print out the content of the web-application.
echo $controller->render();
