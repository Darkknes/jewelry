<?php $jewelry_comment_count = get_comments_number(); ?>
<h2 class="comments-title">
   <?php if ( '1' === $jewelry_comment_count ) : ?>
      <?php esc_html_e( 'Comments', '1 Comment', '% Comments', 'jewelry' ); ?>
      <?php else : ?>
         <?php
         printf(
            /* translators: %s: comment count number. */
            esc_html( _nx( '%s comment', '%s comments', $jewelry_comment_count, 'Comments title', 'jewelry' ) ),
            esc_html( number_format_i18n( $jewelry_comment_count ) )
         );
         ?>
      <?php endif; ?>
   </h2><!-- .comments-title -->
   <?php wp_list_comments( array( 
      'callback' => 'my_comments_callback',
      'style'       => 'ol',

   ) ); ?>
   <div class="paginate-com">
      <?php paginate_comments_links( array('prev_text' => '<', 'next_text' => '>') )?>
   </div>
   <?php comment_form(array('comment_notes_before' => ' ','title_reply_before' => '<hr class="hr_comment"><hr class="hr_comment">','title_reply' => '<div class="send_comment">Send Comment</div>',)); ?>

