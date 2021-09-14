<?php
/**
 * Here is the search form template
 * 
 * @package JobGrids
 */
?>
 <form class="search-form" role="search"  method="get" class="search-form" action="<?php  esc_url( home_url( '/' ) ) ;?>">
    <span class="screen-reader-text"><?php _x( 'Search for:', 'label' )?></span>
    <input
    class="search-input"
    type="search"
    placeholder="<?php echo esc_attr_x( 'Search Here...;', 'placeholder' ) ;?>"
    name="s"
    value="<?php echo get_search_query() ?>"
    />
    <button class="search-btn" type="submit">
        <i class="lni lni-search-alt"></i>
        <?php  esc_attr_x( 'Search', 'submit button' ); ?>
    </button>
</form>
