<?php

/* Template Name: Block template */

get_header(); ?>

   
    <?php
        while ( have_posts() ) : the_post();
        
            the_title('<h1>', '</h1>');
            the_content();

        endwhile; // End of the loop.
    ?>


<?php get_footer() ?>