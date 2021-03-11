<?php

/* Template Name: Home template */

get_header(); ?>

   
    <section class="sec_hero">
        <div class="bg" data-aos="fade-down">
            <!-- <img src="<?php echo MBN_ASSETS_URI; ?>/img/bg-hero.jpg" alt=""> -->
            <video poster="<?php echo MBN_ASSETS_URI; ?>/img/bg-hero.jpg" autoplay loop muted playsinline>
                <source src="<?php echo MBN_ASSETS_URI; ?>/video/Elio-Hero.mp4" type="video/mp4" />
                <p>Your browser cannot support .mp4 file</p>
            </video>
        </div>
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6 copy" data-aos="fade-left">
                    <h2><span>IT’s fun!</span> IT’S ELECTRIC!</h2>
                    <ul class="info">
                        <li>
                            <small>Top Speed</small>
                            110 MPH
                        </li>
                        <li>
                            <small>Per Charge</small>
                            +3 Days Commuting
                        </li>
                        <li>
                            <small>Warranty</small>
                            3-Years / 36,000 miles
                        </li>
                        <li class="hide-for-medium">
                            <small>Base Price</small>
                            $ 14,900.00
                        </li>
                    </ul>
                    <div class="note show-for-medium">+ Average commuter drives 52 miles/day.</div>
                    <div class="action">
                        <a href="#send-me-updates" class="button hollow large popup_btn">
                            <i class="icon icn_bell"></i> Send Me updates
                        </a>
                        <span class="price show-for-medium">
                            <small>Base Price</small>
                            $ 14,900.00
                        </span>
                    </div>
                </div>
                <div class="cell large-6 image" data-aos="fade-down-left" data-aos-delay="150">
                    <figure class="img1"><img src="<?php echo MBN_ASSETS_URI; ?>/img/hero-car.png" alt=""></figure>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_intro">
        <div class="grid-container">
            <div class="copy" data-aos="fade-up">
                <h2>We’ve got your 
                    <i class="text-primary">c</i><i class="text-warning">o</i><i class="text-alert">l</i><i class="text-secondary">o</i><i class="text-dark">r</i><i class="text-grey">!</i></h2>
                <p>True Blue, Marshmallow, Red Hot, Rocket Silver, Sour Apple, Licorice, and Creamsicle. Sure, you might know them as Blue, White, Red, Silver, Green, Black, and Orange. But, what fun would that be? At Elio Motors, we’ve developed a palette of colors that turn heads…we thought they deserved a description that’s as fun and unique as the Elio!</p>
            </div>
            <ul class="by_colors" data-aos="fade-up" data-aos-delay="200">
                <li>
                    <figure>
                        <a href="">
                            <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-rocket-silver.png" alt="">
                            <figcaption>Rocket Silver</figcaption>
                        </a>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-sour-apple.png" alt="">
                        <figcaption>Sour Apple</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-creamsicle.png" alt="">
                        <figcaption>Creamsicle</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-red-hot.png" alt="">
                        <figcaption>Red Hot</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-true-blue.png" alt="">
                        <figcaption>True Blue</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-licorice.png" alt="">
                        <figcaption>Licorice</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-color-marshmallow.png" alt="">
                        <figcaption>Marshmallow</figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </section>

    <section class="sec_reviews">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-10 large-10 xlarge-10">
                    <ul class="review_slider" data-aos="fade-up" >

                    <?php                 
                        $tisteArgs = array(
                            'posts_per_page' => -1,
                            'post_type' => 'testimonial',
                        );
                        $testiPost = new WP_Query( $tisteArgs );

                        while ( $testiPost->have_posts() ) { $testiPost->the_post(); ?>
                            
                        <li>
                            <blockquote class="quote large">
                                <p><?php the_field('testi_content'); ?></p>
                                <cite><?php the_title(); ?> <small><?php the_field('testi_subtitle'); ?></small></cite>
                            </blockquote>
                        </li>
                                    
                        <?php } ?>
                    </ul>
                </div>
                <div class="cell medium-2 large-2 xlarge-2 image show-for-medium">
                    <figure class="mask" data-aos="fade-left" data-aos-offset="300">
                        <span class="skew">
                            <img src="<?php echo MBN_ASSETS_URI; ?>/img/car-tree.jpg" alt="">
                        </span>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_featured_in" data-aos="fade-up" data-aos-offset="300">
        <div class="grid-container">
            <h6>Featured in</h6>
            <ul class="feat_logos">
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-foxf.png" alt="Fox & Friends"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-cnbc.png" alt="CNBC"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-ut.png" alt="USA Today"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-foxb.png" alt="Fox Business"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-tnyt.png" alt="The New York Times"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-gma.png" alt="Good Morning America"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-ft.png" alt="Financial Times" height="18"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-twsj.png" alt="The Wall Street Journal"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-fc.png" alt="Fast COmpany"></li>
                <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/logo-forbes.png" alt="forbes"></li>
            </ul>
        </div>
    </section>

    <section class="sec_features">
        <div class="grid-container">
            
            <?php /*
            <div class="preview" data-aos="zoom-in-up" data-aos-offset="300">
                <a class="btn-play" href="<?php echo MBN_ASSETS_URI; ?>/video/Elio-Hero.mp4" data-fancybox><img src="<?php echo MBN_ASSETS_URI; ?>/img/featured-video.jpg" alt=""></a>
            </div>
            */ ?>                   
            <div class="grid-x grid-margin-x">
                <div class="cell large-6 copy">
                    <ul class="list">
                        <li class="icon_left large" data-aos="fade-right" data-aos-offset="300">
                            <i class="icon"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/safety-system-management.svg" alt=""></i>
                            <span>Elio’s unique Safety Management System</span> combines 3 airbags, a unibody frame, anti-lock braking, electronic stability control and 50% larger impact zones than the vehicle you drive now
                        </li>
                        <li class="icon_left large" data-aos="fade-right" data-aos-delay="150">
                            <i class="icon"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/builtin-america.svg" alt=""></i>
                            <span>Built in America</span> <br>in the great State of Louisiana 
                        </li>
                        <li class="icon_left large" data-aos="fade-right" data-aos-delay="200">
                            <i class="icon"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/standard-120v-charging.svg" alt=""></i>
                            Plugs into any <span>standard <br>120-volt outlet for charging</span>
                        </li>
                        <li class="icon_left large" data-aos="fade-right" data-aos-delay="250">
                            <i class="icon"><img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/fold-down-read-seat.svg" alt=""></i>
                            <span>Fold-down rear seat</span> <br>plus cargo space
                        </li>
                    </ul>
                </div>
                <div class="cell large-6 images" data-aos="fade-left" data-aos-offset="300">
                    <ul class="feat_slider">
                        <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/slide-01.jpg" alt=""></li>
                        <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/slide-02.jpg" alt=""></li>
                        <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/slide-03.jpg" alt=""></li>
                        <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/slide-04.jpg" alt=""></li>
                        <li><img src="<?php echo MBN_ASSETS_URI; ?>/img/slide-05.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_newsletter" data-aos="fade-up" data-aos-offset="300">
        <div class="bg">
            <!-- <img src="<?php echo MBN_ASSETS_URI; ?>/img/img-video-placeholder.jpg" alt=""> -->
            <video poster="<?php echo MBN_ASSETS_URI; ?>/img/img-video-placeholder.jpg" autoplay loop muted playsinline>
                <source src="<?php echo MBN_ASSETS_URI; ?>/video/Elio-Reservation.mp4" type="video/mp4" />
                <p>Your browser cannot support .mp4 file</p>
            </video>
        </div>
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6">
                    <h2>WANT AN ELIO?</h2>
                    <h4>Get <span>Elio Insider Updates</span> including:</h4>
                    <ul class="check-list inline">
                        <li>Exclusive videos</li>
                        <li>Events</li>
                        <li>Details about Elio EV</li>
                    </ul>
                </div>
                <div class="cell large-6">
                    <h6 class="sq-title">Say goodbye to ordinary and say hello to Elio.</h6>
                    <a href="#send-me-updates" class="button primary xlarge skew popup_btn"><i class="icon white large icn_bell"></i> Get Updates Now</a>
                </div>
            </div>
        </div>
    </section>


<?php get_footer() ?>