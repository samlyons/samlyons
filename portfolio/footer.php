			</div> 	<!-- end #main-area -->
		
		<div id="scrollfx7">
		<footer id="main_footer" class="clearfix">
			<?php if ( is_single() ) {?>
				<div class="other-projects-footer">
					<h2 class="other-projects-title">Other Projects</h2>
					<?php // Query all private and non private posts for single nav
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query('post_type=project&orderby=date'.'&paged='.$paged); 
					  while ($wp_query->have_posts()) : $wp_query->the_post(); 
					?>
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="single-project-item" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php $wp_query = null;  $wp_query = $temp;?>
					</div>
			<?php } elseif ( is_front_page() ) {?>
						<?php // User Login Welcome
						   if (is_user_logged_in()) {
							  $user = wp_get_current_user();
							  echo '<div class="et-box et-bio">
									<div class="et-box-content" id="scrollfx7">Hi <span class="guests-name">'.$user->display_name.'! </span> I hope you liked my work! Please feel free to <a class="link" href="http://localhost:8080/samlyons2/contact">email me</a> if you have any questions.</div></div>';
						   } else { ?>
							<div class="et-box et-bio">
								<div class="et-box-content">
								Please Note: This is a small selection of my recent freelance work. Unfortunately, I am unable to show projects from 2010-2013 from my full-time position as a Senior Graphic Designer. <a href="/contact">Request a login</a> to view more work!</div>
							</div>
						<?php } ?>

			<?php } elseif ( is_home() ) {?>
			
			<?php } else {?>

			<?php }?>	
			<div id="user-details-footer">
			<div class="mini-menu-footer">
				<?php if ( is_user_logged_in() ) {  ?>
						<?php // Public users ?>
						<?php $zargs = array( 'post_status' => array( 'publish' ) ); ?>
						<?php echo '<a class="sign-out-footer" href="http://samlyons.com.au/wp-login.php?action=logout">Sign Out</a>'; ?>
				<?php } else { ?>
						<?php // Private users ?>
						<?php $zargs['post_status'][] = 'private';?>
						<?php echo '<a href="http://www.samlyons.com.au/login">Sign In</a>'; ?>
				<?php } ?>
				<div class="author-details">
					<p>&copy; Sam Lyons 2014.</p>
				</div>
			</div>
		</div>

		</footer> <!-- end #main_footer -->
		</div>
	</div> <!-- end #container -->
	
	
	<?php wp_footer(); ?>
	

	
	<div id="loader" class="overlay-loader">
		<div class="loader-background color-flip"></div>
		<img class="loader-icon spinning-cog" src="<?php echo get_template_directory_uri(); ?>/svg/cog.svg" data-cog="cog01">
	</div>
	
		<script type="text/javascript">
			$(document).ready(function() {
				$('.fancybox').fancybox();
			});
		</script>
			<script type="text/javascript">
			$('.et_slidertype_left_tabs').scroll(function() { 
				 $('.et_shortcodes_mobile_nav').animate({top:$(this).scrollTop()},100,"linear");
			});
		</script>
	
</body>
</html>