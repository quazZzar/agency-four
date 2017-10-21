		<?php if(is_singular()) : ?>
			<div class="second-section" <?php echo _go('section2_background_color') ? 'style="background: '._go('section2_background_color').';"' : ''; ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<?php if(!_go('section2_use_html_instead_texts')) : ?>
								<h3 class="second-text">
									<?php if(_go('section2_first_text')) : 
										_eo('section2_first_text');
									else : ?>
										get instant access to our
									<?php endif; ?>
								</h3>
								<h2 class="main-text" <?php echo _go('section2_second_text_color') ? 'style="color: '._go('section2_second_text_color').';"' : ''; ?>>
									<?php if(_go('section2_second_text')) : 
										_eo('section2_second_text');
									else : ?>
										RETIREMENT PLANNING TIPS
									<?php endif; ?>	
								</h2>
								<h4>
									<?php if(_go('section2_third_text')) : 
										_eo('section2_third_text');
									else : ?>
										Just enter your information to download now.
									<?php endif; ?>	
								</h4>
							<?php else: 
								_eo('section2_html_texts');
							endif; ?>

						</div>
						<div class="col-md-5">
							<img class="img img-responsive book-img" src="<?php echo _go('section2_image_onright') ? _go('section2_image_onright') : get_template_directory_uri().'/img/retirement-planning-tips.png'; ?>">
						</div>
					</div>
					<div class="row the-submit-form">
						<?php if(!_go('section2_use_html')) : ?>
							<div class="col-md-4">
								<input id="subs_name" name="subs_name" type="text" class="field text medium ctaName" value="" maxlength="255" onkeyup="" required="true" placeholder="Your Name">
							</div>
							<div class="col-md-4">
								<input id="subs_email" name="subs_email" type="email" spellcheck="false" class="reportField field text medium ctaEmail" value="" maxlength="255" required="true" placeholder="Email Address">
							</div>
							<div class="col-md-4">
								<input id="saveForm" name="saveForm" class="reportSubmit btTxt submit" type="submit" value="Access Now!">
							</div>
						<?php else: 
							_eo('section2_html_content');
						endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="footer" <?php echo _go('section5_bgcolor') ? 'style="background: '._go('section5_bgcolor').';"' : ''; ?>>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-3">
						<?php if(_go('section5_col1_use_html')) : 
							_eo('section5_col1_html'); 
						else: ?>
							<img src="<?php echo get_template_directory_uri().'/img/logo-icon.png' ?>">
						<?php endif; ?>
					</div>
					<div class="col-md-3">
						<?php if(_go('section5_col2_use_html')) : 
							_eo('section5_col2_html'); 
						else: ?>
							<h2>Our Location</h2><br><br>
							<p>123 Main St<br>
								Suite 200<br>
							  Jonesville, MI 4800</p>
						<?php endif; ?>
					</div>
					<div class="col-md-3">
						<?php if(_go('section5_col3_use_html')) : 
							_eo('section5_col3_html'); 
						else: ?>
							<h2>CONTACT US</h2><br><br>
							<p>Toll-Free: 1-800-555-1212<br>
								Local: 313-400-4445<br>
							  Fax: 313-222-3333</p>
						<?php endif; ?>
					</div>
					<div class="col-md-3">
						<?php if(_go('section5_col4_use_html')) : 
							_eo('section5_col4_html'); 
						else: ?>
							<h2>Connections</h2><br><br>
							<?php if(_go('section5_col4_facebook')) : ?>
								<a href="<?php echo _eo('section5_col4_facebook') ?>" target="_blank"><img src="<?php echo get_template_directory_uri().'/img/fb.png'; ?>"></a>
							<?php endif;
							if(_go('section5_col4_twitter')) : ?>
								<a href="<?php echo _eo('section5_col4_twitter') ?>" target="_blank"><img src="<?php echo get_template_directory_uri().'/img/tw.png'; ?>"></a>
							<?php endif;
							if(_go('section5_col4_linkedin')) : ?>
								<a href="<?php echo _eo('section5_col4_linkedin') ?>" target="_blank"><img src="<?php echo get_template_directory_uri().'/img/li.png'; ?>"></a>
								<?php endif;
							if(_go('section5_col4_youtube')) : ?>
								<a href="<?php echo _eo('section5_col4_youtube') ?>" target="_blank"><img src="<?php echo get_template_directory_uri().'/img/yt.png'; ?>"></a><br><br>
							<?php endif; ?>
							<img class="bbb" src="<?php echo get_template_directory_uri().'/img/bbb.png'; ?>">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="disclosure">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php if(!_go('hide_footer_menu')) : ?>
							<ul class="footer-navigation">
								<?php wp_nav_menu( 
									array(
										'title_li' => '',
										'theme_location' => 'footer_menu',
										'container' => false,
										'items_wrap' => '%3$s',
										'fallback_cb' => 'wp_list_pages',
										'after' => ' | '
									)
								); ?>
							</ul>
						<?php endif; ?>
						<br>
						<?php if(_go('footer_texts')) : 
							_eo('footer_texts'); 
						else : ?>
[This is a Demo Site] CoreCap Investments, Inc., is a member of FINRA/SIPC and does not provide tax or legal advice. The information presented here is not specific to any individual's personal circumstances.
<br><br>
This website does not constitute an offer to sell or a solicitation of offers to purchase or sell securities in any jurisdiction in which CoreCap Investments, Inc., is not registered as a broker-dealer.
<br><br>
To the extent that this material concerns tax matters, it is not intended or written to be used, and cannot be used, by a taxpayer for the purpose of avoiding penalties that may be imposed by law.  Further, nothing on this site is intended to be, or to be relied upon as, tax, legal, or investment advice. Investors should consult with their own tax, legal, and investment professionals.
<br><br>
These materials are provided for general information and educational purposes based upon publicly available information from sources believed to be reliable—we cannot assure the accuracy or completeness of these materials. The information in these materials may change at any time and without notice.
					</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>