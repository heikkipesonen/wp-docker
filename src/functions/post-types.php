<?php

add_action('init', function () {
  register_post_type('blog',
    array(
      'labels' => array(
        'name' => __('Blog posts'),
        'singular_name' => __('Blog post'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'blogi'
      )
    )
  );

  register_post_type('room',
    array(
      'labels' => array(
        'name' => __('Rooms'),
        'singular_name' => __('Room'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'huoneet'
      )
    )
  );
});
