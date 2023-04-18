<?php

class Form
{
  private $fields = array();
  private $action;
  private $submit = "Submit Form";
  private $jumField = 0;

  public function __construct($action, $submit)
  {
    $this->action = $action;
    $this->submit = $submit;
  }

  public function displayForm()
  {
    $url =
      strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/"))[0] : @$_REQUEST['url'];
    echo "<form class='space-y-6' action='" . $this->action . "' method='POST'>";
    echo "<h5 class='text-xl font-medium text-gray-900 dark:text-white capitalize'>" . $url . " Data</h5>";
    for ($j = 0; $j < count($this->fields); $j++) {
      echo "<div><label for='nama' class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>" . $this->fields[$j]['label'] . "</label>";
      echo "<input type='text' value='" . $this->fields[$j]['value'] . "' name='" . $this->fields[$j]['name'] . "' class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white' style='background-color:RGBA( 224, 255, 255, 1 );' placeholder='" . $this->fields[$j]['label'] . "' required>
    </div>";
    }
    echo "<button type='submit' name='" . $this->submit . "' class='w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>Save</button>";
    echo "</form>";
  }

  public function addField($name, $label, $value = "")
  {
    $this->fields[$this->jumField]['name'] = $name;
    $this->fields[$this->jumField]['label'] = $label;
    $this->fields[$this->jumField]['value'] = $value;
    $this->jumField++;
  }
}