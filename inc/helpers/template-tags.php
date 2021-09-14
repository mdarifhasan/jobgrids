<?php
/**
 * Neccessry Function of the theme
 * 
 * @package JobGrids
 */

 /**
  *  Adding SVG Support to the theme
  * 
  * Wp v4.7.1 and higher
  */

  add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

  /**
   * Adding Views and count
   * 
   **/ 
  function getPostViews($postID){
    $count_key = 'jobgrids_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'jobgrids_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }elseif(is_single( )){
        // Post wiew will be count if the page is single post page
        $count++;
        update_post_meta($postID, $count_key, $count);
    }else{
        return $count;
    }
    echo $count;
}
/**
 * Function for the time when the post was poted
 */
function jobgrids_posted_on(){
  $time_string='<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  // If the post is modified and the posted time and modified time is not same
  if(get_the_time('U') !== get_the_modified_time('U')){
      $time_string='<time class="entry-date published" datetime="%1$s">%2$s</time><time class="entry-date updated" datetime="%3$s">%4$s</time>';
  }
  $time_string=sprintf(
      $time_string,
      esc_attr( get_the_date(DATE_W3C) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date(DATE_W3C) ),
      esc_html( get_the_modified_date() )
  );
  $posted_on=sprintf(
      esc_html_x( '%s','post on','aquila-one' ),
      '<a href = "' . esc_url(get_permalink( )) . '"rel="bookmark" ><i class="lni lni-calendar"></i>' .$time_string . '</a>'
  );
  echo '<span class="posted-on text-primary"> ' .$posted_on. '</span>';
}
/**
 * Pagination of the theme
 */
function jobgrids_pagination(){
  $allowed_tags=[
    'ul'=>[
        'class'=>[]
    ],
    'li'=>[
      'class'=>[]
    ],
    'a'=>[
        'class'=>[],
        'href'=>[]
    ]

];
$args=[
    'before_page_number' =>'<li>',
    'after_page_number'  =>'</li>'
    
];
printf(
    '<ul class="pagination-list">%s</ul>',
    wp_kses(
        paginate_links( $args ),
        $allowed_tags
    )
);
}