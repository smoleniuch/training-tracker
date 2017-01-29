<?php

class Template{

  /**
   * HTML file that will be parsed.
   * @var string
   */
  protected $file;
  /**
   * Names will be replaced for values in paresed html.
   * Must be associative array  $name => $value.
   * @var array
   */
  protected $values = array();

  public function __construct($file){

    $this->file = $file;

  }
  /**
   * set values to replace
   * @param array $values associative array $name => $value
   */
  public function set($values = array()){

    foreach($values as $name => $value){

      $this->values[$name] = $value;

    }

  }

  public function output(){

    if(!file_exists($this->file)){

      return "Error parsing template from {$this->file}";

    }
    $output = file_get_contents($this->file);
    //var_dump($output);
    foreach($this->values as $name => $value){

      $output = str_replace("[@$name]",$value,$output);

    }

    //remove unset values

    $output = preg_replace("/\[@.+?\]/","",$output);
    

    //var_dump($output);
    return $output;
  }

}

 ?>
