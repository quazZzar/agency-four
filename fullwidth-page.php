<?php /* Template Name: Full Width Page */
get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();
						the_content(); 
					endwhile;
				endif; ?>
				<form class="upto-email-utility hidden-xs">
					<fieldset>
						<span class="label">
							<label for="subscription-email">Get weekly updates:</label>
						</span>
						<span class="input">
							<input type="email" id="page-subscription-email" placeholder="Email Address">
						</span>
						<span class="form-button">
							<button id="submbtn" type="submit">Subscribe</button>
						</span>
					</fieldset>
				</form>
			</div>
		
		</div>
	</div>
<?php get_footer(); ?>