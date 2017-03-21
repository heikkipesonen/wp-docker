<?php
class Menu extends BaseComponent {
  public function __construct ($options = array('name' => 'main-menu', 'classNamee' => 'main-menu')) {
    parent::__construct(array('name' => $name));
    $this->menu = wp_nav_menu(array(
      'menu' => $this->options->name,
      'walker'=> new MenuWalker(),
      'echo' => false
    ));
  }

  public function render () {
    return <<<EOT
    <navigation class="{$this->classNames()}">

    </navigation>
EOT;
  }
}
