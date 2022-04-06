<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */

?>
</div><!-- .main-container -->
<?php
      global $rs_option;
      require get_parent_theme_file_path('inc/footer_style/footer.php');    
  ?>
  </div><!-- #page -->

    <?php 
    if(!empty($rs_option['show_top_bottom'])){  
      $rstop_bottom=$rs_option['show_top_bottom'];
      if($rstop_bottom == 1){
      ?>
      <!-- start scrollUp  -->
      <div id="scrollUp">
          <i class="fa fa-angle-up"></i>
      </div>   
      <?php }
      }
    ?>

    <?php       
      wp_footer(); 
    ?>  
     </body>
</html>
