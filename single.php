<?php get_header() ?>

<div class="sec_post_desc">
	<div class="grid-container">	
		<div class="grid-x grid-margin-x align-center">
			<div class="cell large-7">	
				
				<?php while ( have_posts() ) : the_post(); 
					$terms = get_the_terms($post->ID, 'category' ); ?>

				<div class="post_head">
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
						<?php /*
						<figure class="author">
							<a href="#"><img src="<?php echo MBN_ASSETS_URI; ?>/img/author.png" alt=""></a>  
							<figcaption>Kaiser Sagmeister </figcaption>  
						</figure>
						*/ ?>
						<div class="date_time">
							<span class="date"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/calendar.svg" alt=""> <?php echo get_the_date('M d, Y'); ?></span>
							<span>&bull;</span>
							<span class="time"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/time.svg" alt=""> <?php echo reading_time(); ?> read</span>
						</div>
						<ul class="share_this">
							<li class="share-to-fb">
								<a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','newwindow', 'width=560,height=560'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
									<i><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/facebook-sq.svg" alt=""></i>
								</a>
							</li>
							<li class="share-to-tweet">
								<a onclick="window.open('http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>','newwindow', 'width=560,height=560'); return false;" href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>">
									<i><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/twitter-sq.svg" alt=""></i>
								</a>
							</li>
							<li class="share-to-link">
								<a onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>','newwindow', 'width=560,height=560'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>">
									<i><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/linkedin.svg" alt=""></i>
								</a>
							</li>
							<li class="share-to-email">
								<?= '<a href="mailto:?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20'; ?><?php bloginfo('name'); ?><?= '&body='.get_the_title().get_the_permalink().' title="Email to a friend/colleague" target="_blank">'; ?>
								<i><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/email.svg" alt=""></i>
								<?= "</a>"; ?>
							</li>
							<li class="share-to-share">
								<a href="#">
									<i><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/share.svg" alt=""></i>
								</a>
							</li>

						</ul>
						</div>
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