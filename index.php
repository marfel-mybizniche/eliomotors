<?php get_header() ?>

<div class="sec_banner test">
    <div class="grid-container">
        <hgroup>
            <h5>Media</h5>
            <h1>
                <?php  single_post_title(); ?>
                <?= single_cat_title('', false); ?>
            </h1>
        </hgroup>
    </div>
</div>


<?php
$category = get_queried_object();
 if(!is_home() and $category->term_id != 1) {  
    query_posts( array('post__in' => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1) );
    while ( have_posts() ) : the_post(); ?>
    <div class="sec_feat_post">
        <div class="grid-container">
            <div class="grid-x post_sticky">
                <div class="cell large-5 image">
                    <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        } else {
                            echo '<img src="'.MBN_ASSETS_URI.'/img/img-placeholder.png" />';
                        }
                    ?>
                </div>
                <div class="cell large-7 align-self-middle">
                    <article>
                        <h6><?php the_title();?></h6>
                        <?php the_content(); ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <?php  endwhile; wp_reset_query(); 
} ?>

<div class="sec_blog_posts">
    <div class="grid-container">
        <div class="grid-x grid-margin-x post_lists">
            <?php 
                while ( have_posts() ) : the_post(); ?>
                <div class="cell large-4 small-12 post_item">
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
            <?php endwhile; wp_reset_query();  ?>
        </div>
        <?php the_posts_pagination(array('show_all' => true, 'prev_next' => true)); ?> 
        
    </div>     
</div>

<?php get_footer() ?>