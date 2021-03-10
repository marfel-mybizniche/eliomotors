<?php get_header() ?>

<div class="sec_post_desc">
	<div class="grid-container">	
		<div class="grid-x grid-margin-x">
			<div class="cell large-8 large-offset-2">	
				
				<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<p class="post_excerpt"><?php the_excerpt(); ?></p>
				<div class="post-meta">
					<figure class="author">
						<a href="#"><img src="assets/img/author.jpg" alt=""></a>  
						<figcaption>Kaiser Sagmeister </figcaption>  
					</figure>
					<div class="date_time">
						<span class="date"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/" alt=""> <?php echo get_the_date('M d, Y'); ?></span>
						<span class="time"><?php echo reading_time(); ?> read</span>
					</div>

				</div>
			
				<div class="post-body">
				<?php the_content(); ?>
				</div>
				
				<?php endwhile;  ?>
			</div>
		</div>
	</div>	

</div>

<div class="sec_post_rel">
	<div class="grid-container">
	<div class="relatedposts">
		<h3>Related Media</h3>
		
		</div>
	</div>
</div>

<?php get_footer() ?>