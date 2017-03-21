<?php
class Share extends BaseComponent {
  private $tags = array();

  public function __construct($options = array()) {
    parent::__construct($options);
  }

  public function render() {
    return <<<EOT
      <meta name="og:image" content="{$this->options->image}">
      <meta name="og:url" content="{$this->options->url}">
      <meta name="og:title" content="{$this->options->title}">
      <meta name="og:description"  content="{$this->options->description}">
EOT;
  }
}
