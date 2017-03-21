<?php
function toCamel($string, $capitalizeFirstCharacter = false) {
    $str = str_replace('-', '', ucwords($string, '-'));
    if (!$capitalizeFirstCharacter) {
        $str = lcfirst($str);
    }
    return $str;
}

function toKebab($input) {
  preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
  $ret = $matches[0];
  foreach ($ret as &$match) {
    $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
  }
  return implode('_', $ret);
}

spl_autoload_register(function ($name) {
  include 'components/'.strtolower(toKebab($name)).'.php';
});

// $frontpage = get_post( get_option( 'page_on_front' ) );
// $fields = get_fields($frontpage->ID);
//
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
    <meta name="description" content="<?php echo $fields['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $fields['meta_keywords']; ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" href="<?php  echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php  echo get_template_directory_uri(); ?>/style.css">

    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrapper" class="container-fluid">
