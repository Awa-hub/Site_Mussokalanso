<?php if(!empty($rs_option['off_canvas'])){
            $off = $rs_option['off_canvas'];
            if( $off == 1 ){
       ?>
          <div class='nav-link-container'> 
            <a href='#' class="nav-menu-link"><i class="fa fa-bars" aria-hidden="true"></i></a> 
          </div>
          <?php } 
      }

     //off convas here
    if(!empty( $rs_option['off_canvas'] )){
        $off = $rs_option['off_canvas'];
        if( $off == 1 ){
    ?>
    <nav class="nav-container nav">
        <ul class="sidenav">
            <li class='nav-close-menu-li'><button><?php esc_html_e('x', 'batiment');?></button></li>
            <?php dynamic_sidebar('sidebarcanvas-1'); ?>
        </ul>
    </nav>
    <?php }
}?>