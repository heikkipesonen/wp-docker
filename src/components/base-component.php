<?php

class BaseComponent {

  public $config;
  public $DEFAULT_CONFIG = array();
  public $id;

  public function __construct ($config) {
    $this->setOptions($config);
    $this->id = uniqid();
  }

  public function setOptions ($config) {
    $this->$config = array_merge($this->DEFAULT_CONFIG, $config);
  }

  public function classNames () {
    return implode($this->config['classNames'], ' ');
  }

  public function __toString () {
    return $this-render();
  }

  public function render () {}
}
