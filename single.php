<?php get_header() ?>

<div class="sec_post_desc">
	<div class="grid-container">	
		<div class="grid-x grid-margin-x">
			<div class="cell large-8 large-offset-2">	
				
				<?php while ( have_posts() ) : the_post(); 
					$terms = get_the_terms($post->ID, 'category' ); ?>

				<h6 class="post_cat">
					<?php 
						$controlPostCategory = get_the_category(get_the_ID());
						$postCategoryLength = count($controlPostCategory);
						$postCtr = 1;
					?>
					<?php foreach ($controlPostCategory as $pc): ?>
						<?= $pc->name ?><?= $postCtr != $postCategoryLength ? ',' :''; ?>
					<?php $postCtr++; endforeach; ?>
				</h6>
				<h1 class="post_title"><?php the_title(); ?></h1>
				<p class="post_excerpt"><?php the_excerpt(); ?></p>
				<div class="post_meta">
					<figure class="author">
						<a href="#"><img src="assets/img/author.jpg" alt=""></a>  
						<figcaption>Kaiser Sagmeister </figcaption>  
					</figure>
					<div class="date_time">
						<span class="date"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/" alt=""> <?php echo get_the_date('M d, Y'); ?></span>
						<span class="time"><?php echo reading_time(); ?> read</span>
					</div>
					<div class="share_this">

					</div>
				</div>
			
				<div class="post_body">
				<?php the_content(); ?>
				</div>

				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</div>	

</div>

<div class="sec_post_rel">
	<div class="grid-container">
		<h4>Related Media</h4><br>
		<?php                 
		$argsRel = array(
			'posts_per_page' => 3,
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $terms[0]->slug,
					'include_children' => false
				)
			),
			'post_type' => 'post',
			'orderby' => 'title,',
			'post__not_in' => array( $post->ID )
		);
		$relPosts = new WP_Query( $argsRel ); ?>
		<?php if($relPosts->have_posts()): ?>				
		<div class="grid-x grid-margin-x related_lists">
            <?php while ( $relPosts->have_posts() ) { $relPosts->the_post(); ?>

                <div class="cell large-4 medium-6 small-12 post_item">
                    <div class="post_box">
                        <figure>
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="'.MBN_ASSETS_URI.'/img/img-placeholder.png" />';
                                }
                            ?>
                        </figure>
                        <article>
                            <h6>
                                <?php 
                                    $controlPostCategory = get_the_category(get_the_ID());
                                    $postCategoryLength = count($controlPostCategory);
                                    $postCtr = 1;
                                ?>
                                <?php foreach ($controlPostCategory as $pc): ?>
                                    <?= $pc->name ?><?= $postCtr != $postCategoryLength ? ',' :''; ?>
                                <?php $postCtr++; endforeach; ?>
                            </h6>
                            <h4><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </article>
                    </div>
                </div>
            <?php } wp_reset_query();  ?>
        </div>
		<?php else : ?>
			<p> No Related post </p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer() ?>