<?php
/**
 * Navigation file template
 * 
 * @package JobGrids
 */
$menu_class=\JobGrids_THEME\Inc\Menus::get_instance();
$header_menu_id=$menu_class->get_menu_id('jobgrids-header-menu');
$header_menus=wp_get_nav_menu_items($header_menu_id);


?>
<div class="navbar-area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <nav id="header-navbar" class="navbar <?php echo esc_attr(get_theme_mod('header_menu_position')) ?> navbar-expand-lg">
        <!-- Header logo -->
          <?php
            if(function_exists('the_custom_logo')){
              the_custom_logo( );
            }
          ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
          </button>
          <!-- Header menu and button -->
          <div class="menu-btn d-flex justify-content-center align-items-center"> 
            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
              <?php
                if(!empty($header_menus) && is_array($header_menus)){
              ?>
                  <ul id="nav" class="navbar-nav ml-auto">
                    <?php
                      foreach($header_menus as $menu_item){
                        if(!$menu_item->menu_item_parent){
                          $child_menu_items=$menu_class->get_child_menu_items($header_menus,$menu_item->ID);
                          $has_children=!empty($child_menu_items) && is_array($child_menu_items);
                          if(!$has_children){
                            ?>
                              <li class="nav-item">
                                <a href="<?php echo esc_url( $menu_item->url ) ?>">
                                  <?php 
                                    echo esc_html($menu_item->title);
                                  ?>
                                </a>
                              </li>
                            <?php
                          }else{
                            ?>
                              <li class="nav-item">
                                <a href="<?php echo esc_url($menu_item->url) ?>">
                                  <?php echo esc_html($menu_item->title); ?>
                                </a>
                                  <ul class="sub-menu">
                                    <?php
                                      foreach($child_menu_items as $child_menu_item){
                                        ?>
                                          <li>
                                            <a href="<?php echo esc_url($child_menu_item->url) ?>">
                                              <?php echo esc_html($child_menu_item->title); ?>
                                            </a>
                                          </li>
                                        <?php
                                      }
                                    ?>
                                  </ul>
                              </li>
                            <?php
                          }
                        }
                      }
                    ?>
                  </ul>
              <?php
                }
              ?>
            </div>
  
            <div class="button <?php if(true==get_theme_mod('header_btn_show',true)){ echo 'd-block';}else{ echo 'd-none';} ?>">
              <a href="<?php echo esc_url(get_theme_mod('header_btn_link')) ?>"  target="_blank" class="btn" >
                <?php echo esc_html( get_theme_mod('header_btn_txt') ) ?>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
