<?php
if ( has_nav_menu( 'menu-1' ) ) {
    // User has assigned menu to this location;
    // output it
    ?>
    <nav class="nav navbar">
        <div class="navbar-menu">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu-single',
                ) );
            ?>
        </div>
        <div class='nav-link-container mobile-menu-link'> 
            <a href='#' class="nav-menu-link"><i class="fa fa-bars" aria-hidden="true"></i></a> 
        </div>
    </nav>
    <?php
    }
?>

<nav class="nav-container mobile-menu-container">
    <ul class="sidenav">
        <li class='nav-close-menu-li'><button><?php esc_html_e('x', 'batiment');?></button></li>
        <li>
          <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu-single2',
                ) );
            ?>
        </li>
    </ul>
</nav>