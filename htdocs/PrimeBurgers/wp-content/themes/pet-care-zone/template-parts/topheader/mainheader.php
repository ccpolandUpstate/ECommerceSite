<?php
/**
 * Displays main header
 *
 * @package Pet Care Zone
 */

$pet_care_zone_sticky_header = get_theme_mod('pet_care_zone_sticky_header');
    $data_sticky = "false";
    if ($pet_care_zone_sticky_header) {
        $data_sticky = "true";
    }
?>
<div class="main_header py-2" data-sticky="<?php echo esc_attr($data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 align-self-md-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $pet_care_zone_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $pet_care_zone_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('pet_care_zone_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php }?>
                            <?php else : ?>
                                <?php if( get_theme_mod('pet_care_zone_logo_title_text',true) != ''){ ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php }?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $pet_care_zone_description = get_bloginfo( 'description', 'display' );
                            if ( $pet_care_zone_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('pet_care_zone_theme_description',false) != ''){ ?>
                            <p class="site-description"><?php echo esc_html($pet_care_zone_description); ?></p>
                        <?php }?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-3 col-sm-2 align-self-md-center">
                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-6 align-self-md-center">
                <div class="social-link text-center text-lg-right text-md-right">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','pet-care-zone' ); ?>"><i class="fas fa-shopping-cart"></i></a>
                    <?php }?>
                    <div class="social-link">
          				  		<?php if(get_theme_mod('pet_care_zone_facebook_url') != ''){ ?>
          							<a href="<?php echo esc_url(get_theme_mod('pet_care_zone_facebook_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('pet_care_zone_facebook_icon') ); ?>"></i></a>
          						<?php }?>
          						<?php if(get_theme_mod('pet_care_zone_twitter_url') != ''){ ?>
          							<a href="<?php echo esc_url(get_theme_mod('pet_care_zone_twitter_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('pet_care_zone_twitter_icon') ); ?>"></i></a>
          						<?php }?>
          						<?php if(get_theme_mod('pet_care_zone_intagram_url') != ''){ ?>
          							<a href="<?php echo esc_url(get_theme_mod('pet_care_zone_intagram_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('pet_care_zone_instagram_icon') ); ?>"></i></a>
          						<?php }?>
          						<?php if(get_theme_mod('pet_care_zone_linkedin_url') != ''){ ?>
          							<a href="<?php echo esc_url(get_theme_mod('pet_care_zone_linkedin_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('pet_care_zone_linkedin_icon') ); ?>"></i></a>
          						<?php }?>
          						<?php if(get_theme_mod('pet_care_zone_pintrest_url') != ''){ ?>
          							<a href="<?php echo esc_url(get_theme_mod('pet_care_zone_pintrest_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('pet_care_zone_pinterest_icon') ); ?>"></i></a>
          						<?php }?>
          					</div>
                </div>
            </div>
        </div>
    </div>
</div>
