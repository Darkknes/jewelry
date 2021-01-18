<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jewelry
 */

?>

<footer id="colophon" class="site-footer container">
	<div class="site-info">
		<ul class="list-inline">
			<li class="list-inline-item logo"><?php echo get_custom_logo();?></li>
			<li class="list-inline-item"><a href="">INSAGRAM</a></li>
			<li class="list-inline-item"><a href="">FACEBOOK</a></li>
			<li class="list-inline-item"><a href="">PINTEREST</a></li>
			<li class="list-inline-item right">
				<img src="../img/6.png" alt="">
				<input id="emails" name="emails" type="emails" value="" size="30" maxlength="100" placeholder="Email" required="required">
			</li>
		</ul>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
