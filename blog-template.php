<?php
/*
 * Template name: Блог
 *
 */
get_header();
?>


<main id="primary" class="site-main container">
 <div class="pages">
  <?php
  while ( have_posts() ) :
   the_post();

   get_template_part( 'template-parts/content-page' );

         // If comments are open or we have at least one comment, load up the comment template.
   if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;

      endwhile; // End of the loop.
      ?>

    </main><!-- #main -->
  </div>

  <div class="container">
    <div class="img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" alt="">
    </div>
  </div>
  <?php
  get_footer();
  ?>