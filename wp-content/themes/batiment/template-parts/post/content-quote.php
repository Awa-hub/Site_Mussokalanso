<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
if(has_post_thumbnail()){
?>
<div class="bs-img">
  <?php the_post_thumbnail()?>
</div>
<?php
}?>

<div class="single-content-full">	
	<div class="bs-info">
	  <ul class="bs-meta">
	    <li class="bs-date"><i class="fa fa-calendar"></i><span>
	       <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
	      </span></li>
	    <li><i class="fa fa-user"></i>
	      <?php the_author(); ?>
	     </li>
	     <?php if(get_the_category()){?>
	        <li class="category-name"><i class="fa fa-folder-open-o"></i>
	          <?php the_category(', '); 
	        ?>
	      </li>
	 <?php }?>
	  </ul>
	</div>
 <div class="bs-desc">
	<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$audio = false;

		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
		}

	?>

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the audio file.
			if ( ! empty( $audio ) ) {
				foreach ( $audio as $audio_html ) {
					echo '<div class="entry-audio">';
						echo esc_attr($audio_html);
					echo '</div><!-- .entry-audio -->';
				}
			};

		};

		if ( is_single() || empty( $audio ) ) {

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'batiment' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'batiment' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );

		};
		?>
			</div><!-- .entry-content -->	
	</div>
	<div class="clearfix"></div>
</div>

