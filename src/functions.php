<?php
spl_autoload_register(function ($name) {
  include 'components/'.strtolower(toKebab($name)).'.php';
});

add_theme_support('post-thumbnails');

foreach (glob(__DIR__ . '/functions/*.php') as $file) {
  include $file;
}
