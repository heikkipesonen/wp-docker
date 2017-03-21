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
    if ($this->config['classNames']) {
      return implode($this->config['classNames'], ' ');
    }

    return '';
  }

  public function render () {}

  public function __toString () {
    return $this->render();
  }

}
