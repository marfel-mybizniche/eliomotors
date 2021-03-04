<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'mbn-accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
//$accordionTitle = get_field('accordion_title') ?: 'Custom Page Title';

?>
<?php if( have_rows('accordion_items') ): ?>
    <ul id="<?=  $id; ?>" class="accordion <?= $className ?>" data-accordion>
    <?php while( have_rows('accordion_items') ): the_row(); ?>
        <li class="accordion-item" data-accordion-item>
			<a href="#" class="accordion-title"><?php the_sub_field('heading'); ?></a>
            
			<div class="accordion-content" data-tab-content>
                <?php if( have_rows('media') ): while( have_rows('media') ) : the_row();
                    if(!empty(sub_field('img'))) { ?>
                    <img class="<?php the_sub_field('align'); ?>" src="<?php the_sub_field('img'); ?>" alt="">
                <?php } endwhile; endif;  ?>

			    <?php the_sub_field('content'); ?>
			</div>
        </li>
    <?php endwhile; ?>
    </ul>
<?php else: ?>
    <img src="<?php echo MBN_ASSETS_URI; ?>/img/mbn-accordion.png" alt="" style="display:block; margin:0 auto;">
<?php endif;  ?>