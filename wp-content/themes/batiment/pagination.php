<div class="ps-navigation">
	<ul>
		<?php
		 	$next_post = get_next_post();
	  	 	$url_next = is_object( $next_post ) ? get_permalink( $next_post->ID ) : ''; 
	  		 $title = is_object( $next_post ) ? get_the_title( $next_post->ID ) : ''; 
		 	if($next_post):?>	
			  	<li class="prev">
				    <a href="<?php echo esc_url( $url_next ) ?>">
				    	<span><i class="fa fa-long-arrow-left"></i> <?php echo esc_attr( $title ); ?></span>
					</a>
			  	</li>
		 	<?php endif; ?>

		  <?php 
			    $previous_post = get_previous_post();
	  			$url_previous = is_object( $previous_post ) ? get_permalink( $previous_post->ID ) : '';
	  			$title = is_object( $previous_post ) ? get_the_title( $previous_post->ID ) : '';
			  	if($previous_post):?>
				  	<li class="next">
						<a href="<?php echo esc_url( $url_previous ) ?>">
						    <span><?php echo esc_attr( $title ); ?> <i class="fa fa-long-arrow-right"></i></span>
						</a>
				  	</li>
		  		<?php endif; ?>
	</ul>
	<div class="clear-fix"></div>
</div> 