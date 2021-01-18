<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jewelry
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
 <meta charset="<?php bloginfo( 'charset' ); ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="profile" href="https://gmpg.org/xfn/11">
 <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <?php wp_body_open(); ?>
 <div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'jewelry' ); ?></a>

  <header id="masthead" class="site-header">


   <!-- <nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark bg-primary"> -->
     <nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark main-navigation">

      <div class="container">
       <div class="col col-md-3">
        <div class="site-branding">
         <?php
         the_custom_logo();
         if ( is_front_page() && is_home() ) :
          ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
      else :
       ?>
       <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
       <?php
     endif;
     $jewelry_description = get_bloginfo( 'description', 'display' );
     if ( $jewelry_description || is_customize_preview() ) :
       ?>
       <p class="site-description"><?php echo $jewelry_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
     <?php endif; ?>
   </div><!-- .site-branding -->
 </div>

 <div class="col">
   <script type="text/javascript">
    function myFunction(x) {
     x.classList.toggle("change");
   }
 </script>
 <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
  <div class="containers" onclick="myFunction(this)">
   <div class="bar1"></div>
   <div class="bar2"></div>
   <div class="bar3"></div>
 </div>
</button>

<?php
wp_nav_menu(
 array(
  'theme_location' => 'menu-1',
  'add_li_id'        => 'nav-item',         
  'depth' => 2,
  'menu_class' => 'navbar-nav mx-auto',
)
);
?>
</div>
</div>
</nav><!-- #site-navigation -->



</header><!-- #masthead -->
<div class="container">
 <div class="images">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/02.png" alt="">
</div>
</div>