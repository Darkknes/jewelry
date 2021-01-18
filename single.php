<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jewelry
 */

get_header();
?>
<div class="container">
	<div class="images">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/01.png" alt="">
	</div>
</div>

<div class="container">
	<main id="primary" class="site-main site_primary">
		<div class="container">
			<div class="row">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<div class="prev"><div class="arrows2"></div></div> <br><span class="nav-subtitle">' . esc_html__( 'Preview Post:', 'jewelry' ) . '</span><br><span class="nav-title">%title</span>',
							'next_text' => '<div class="next"><div class="arrows"></div></div> <br><span class="nav-subtitle">' . esc_html__( 'Next Post:', 'jewelry' ) . '</span><br><span class="nav-title">%title</span>',
						)
					);

			// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
				endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

</div>

</div>
<div class="container top">	
	<hr class="hr_comment">
	<hr class="hr_comment">
</div>	
<?php
get_footer();
