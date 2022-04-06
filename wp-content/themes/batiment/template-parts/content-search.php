<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
  <header class="entry-header">
    <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
    </header>
    <!-- .entry-header -->
    
    <div class="entry-summary">
      <p><?php echo batiment_wpex_get_excerpt ( $defaults = array(
            'length'          => 45
          ) ); ?></p>
        <div class="blog-button">
            <a href="<?php the_permalink()?>" class="readmore"><?php echo esc_html_e('Read More','batiment');?> <i class="fa fa-angle-double-right"></i></a>
          </div>
      </div>
    <!-- .entry-summary -->
    
    <footer class="entry-footer">
      <?php batiment_entry_footer(); ?>
    </footer>
    <!-- .entry-footer --> 
</article>
