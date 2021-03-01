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
$id = 'banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$bannerTitle = get_field('banner_title') ?: 'Custom Page Title';
$bannerSubtitle = get_field('banner_subtitle') ?: 'Sub Title';
$bannerDescription = get_field('banner_description') ?: 'Description / Caption';

?>
<section class="sec_banner">
	<div class="banner_copy">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-center">
				<div class="cell large-9">
                    <?php if(get_field('banner_subtitle') != '') { ?>
					<h5><?= get_field('banner_subtitle') ?></h5>
                    <?php } ?>
                    <?php if(get_field('banner_title') != '') { ?>
					<h2><?= get_field('banner_title') ?></h2>
                    <?php } ?>
                    <?php if(get_field('banner_description') != '') { ?>
					<p><?= get_field('banner_description') ?></p>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>