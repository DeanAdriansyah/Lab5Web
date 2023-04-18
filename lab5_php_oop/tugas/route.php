<?php
class Route
{
  private $config = [];
  public function __construct($config)
  {
    $this->config = $config;
  }

  public function load($routeName)
  {
    if (array_key_exists($routeName, $this->config)) {
      require($this->config[$routeName]);
    } else if ($routeName == "") {
      require($this->config["home"]);
    } else {
      include_once "views/error.php";
    }
  }
}