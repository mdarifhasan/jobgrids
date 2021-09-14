<?php
/**
 * Faq template 
 * 
 * @package Jobgrids
 * 
 *  * Template Name:Faq
 */
$defaults = [
  [
    'faq_title' =>esc_html__( 'Faq title','jobgrids' ),
    'faq_desc'  =>esc_html__( 'Description','jobgrids' )
]
];

// Theme_mod settings to check.
$faqs = get_theme_mod( 'faqs', $defaults );

get_header( );
get_template_part('/template-parts/breadcrumbs');
?>

<section class="faq-area section">
  <div class="container">
    <div class="row">
     
        <?php 
        $i=2;
          foreach($faqs as $faq){
            ?>
              <div class="col-lg-6 col-12">
                <div class="d-flex single-faq wow fadeInUp" data-wow-delay="<?php echo $i/10; ?>s">
                  <div class="cercle">
                    <span>?</span>
                  </div>
                  <div class="content">
                    <h4 class="heading"><?php echo $faq['faq_title']; ?></h4>

                    <p class="text">
                      <?php echo $faq['faq_desc'];?>
                    </p>
                    
                  </div>
                </div>
              </div>
            <?php
            $i=$i+10;
          }

        ?>
     
    </div>
  </div>
</section>

<?php get_footer( ); ?>
