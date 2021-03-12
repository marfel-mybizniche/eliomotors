
</main>

<footer id="footer">
	<div class="grid-container">
		<div class="foot_menu">
			<?php
				wp_nav_menu( array( 
					'theme_location' => 'footer-menu',
					'menu'       => '',
					'container'  => '',
					'items_wrap' => '<ul class="grid-x grid-margin-x">%3$s</ul>' 
				));
			?>
		</div>
		<hr class="foot_hr">
		<div class="foot_info">
			<div class="grid-x grid-margin-x">
				<div class="cell large-6 large-order-1 small-order-1">
					<div class="foot_note">
						<p>*MSRP excludes destination/delivery charges, taxes, title, registration, and options/installation.</p>
						<p>Anticipated production date is based upon timely receipt of requisite funding.</p><br>
						<h5>Forward-Looking Statements</h5>
						<p>Certain statements within this website including, but not limited to, statements related to anticipated commencement of commercial production, targeted pricing and performance goals, and statements that otherwise relate to future periods are forward-looking statements. These statements involve risks and uncertainties, which are described in more detail in the Company’s periodic reports filed with the Securities and Exchange Commission, specifically the most recent reports which identify important risk factors that could cause actual results to differ from those contained in the forward-looking statements. Forward-looking statements are made and based on information available to the Company on the date of this website. Elio Motors assumes no obligation to update the information within this website.</p>
					</div>
				</div>
				
				<div class="cell large-12 large-order-3 small-order-2">
					
					<div class="copyright">
						&copy;  <?php echo date('Y'); ?> Elio Motors Inc. All rights reserved. No portion of this site may be reproduced or duplicated without the express permission of Elio Motors Inc.</div>
					<!-- <div class="designby"><a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">Website Design</a> by: My Biz Niche</div> -->
					
				</div>
				
				<div class="cell large-6 large-order-2 small-order-3">
					<div class="foot_logo">
						<img src="<?php echo MBN_ASSETS_URI; ?>/img/logo.png" alt="">
					</div>
					<div class="foot_btns button-group">
						<a class="button primary" href="#">Contact Us</a>
						<a class="button hollow login" href="#">Login</a>
					</div>
					<ul class="foot_social">
						<li><a href="https://www.facebook.com/ElioMotors" target="_blank">
							<img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/facebook.svg" alt=""></a></li>
						<li><a href="https://twitter.com/ElioMotors" target="_blank">
							<img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/twitter.svg" alt=""></a></li>
						<li><a href="https://instagram.com/eliomotors" target="_blank">
							<img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/instagram.svg" alt=""></a></li>
						<li><a href="https://www.youtube.com/user/eliomotors" target="_blank">
							<img src="<?php echo MBN_ASSETS_URI; ?>/img/icon/pinterest.svg" alt=""></a></li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</footer>

<div class="popup_wrap newsletter_popup" id="send-me-updates">
	<div class="popup_box ">		
		<h2><em>WANT AN ELIO?</em></h2>
		<h4 class="tt-uppercase"><em>Get <span class="text-primary">Elio Insider Updates</span> including:</em></h4>
		<ul class="check-list inline primary">
			<li>Exclusive videos</li>
			<li>Events</li>
			<li>Details about Elio EV</li>
		</ul>	
		<?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
		<span class="pop_close"></span>
	</div>
</div>

</div>  

<?php wp_footer() ?>

</body>
</html>