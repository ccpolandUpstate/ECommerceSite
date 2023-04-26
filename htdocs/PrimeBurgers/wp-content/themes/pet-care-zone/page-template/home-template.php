<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php $pet_care_zone_slide_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'pet_care_zone_top_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pet_care_zone_slide_pages[] = $mod;
        }
      }
      if( !empty($pet_care_zone_slide_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pet_care_zone_slide_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 30 )); ?><p>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>

   <section id="pet-product" class="py-5">
    <div class="container">
      <div class="owl-carousel">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $args = array( 
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('pet_care_zone_pet_product_number'),
            'product_cat' => get_theme_mod('pet_care_zone_pet_product'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="product-box">
              <div class="product-image">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
              </div>
              <div class="product-content">
                <h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <p><?php echo esc_html( wp_trim_words( get_the_content(), 10 )); ?><p>
                <div class="addtocart my-4">
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="content-section" class="container">
    <?php
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
          the_content();
        endwhile; 
      endif; 
    ?>
  </section>
</main>

<?php get_footer(); ?>