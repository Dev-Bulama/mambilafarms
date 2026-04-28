<?php
/**
 * Default page template — Elementor-compatible.
 * Content is fully controlled by the page editor / Elementor.
 */
get_header();

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();
