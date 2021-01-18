<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jewelry
 */

?>


<div <?php post_class(); ?>>
   <div class="container">
     <div class="images">
       <img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.png" alt="">
       <img src="<?php echo get_template_directory_uri(); ?>/assets/img/01.png" alt="">
    </div>
 </div>

 <?php jewelry_post_thumbnail(); ?>
 <div class="entry-meta blogs">
   <?php
   the_date(); 
   jewelry_posted_by();
   ?>
</div><!-- .entry-meta -->


<article class="articles" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header blogs">
      <?php
      if ( is_singular() ) :
         the_title( '<h1 class="entry-title title_blogs">', '</h1>' );
      else :
         the_title( '<h2 class="entry-title title_blogs"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      endif;

      if ( 'post' === get_post_type() ) :

         ?>

      <?php endif; ?>
   </header><!-- .entry-header -->



   <div class="entry-content blogs">
      <?php
      the_content(
         sprintf(
            wp_kses(
               /* translators: %s: Name of current post. Only visible to screen readers */
               __( 'Continue reading<span class="screen-reader-text">Читать полностью</span>', 'jewelry' ),
               array(
                  'span' => array(
                     'class' => array(),
                  ),
               )
            ),
            wp_kses_post( get_the_title() )
         )
      );

      wp_link_pages(
         array(
            'before' => '<div class="next">2</div><div class="page-links">' . esc_html__( 'Pages:', 'jewelry' ),
            'after'  => '</div>',
         )
      );
      ?>

   </div><!-- .entry-content -->
   <div class="morelink">
      <a class="the_titles" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" >READ POST</a>
      <div class="comments_numbers">
         <a href="<?php the_permalink() ?>#comments">
            <?php comments_number('0', '1 ', '% '); ?>
         </a><img src="<?php echo get_template_directory_uri(); ?>/assets/img/8.png" alt="">
         
      </div>
   </div>

</article><!-- #post-<?php the_ID(); ?> -->
</div>

