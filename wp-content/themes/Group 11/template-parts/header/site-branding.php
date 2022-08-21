<?php 
/*
* Display Logo and contact details
*/
  $args = array(
   'orderby' => 'title',
   'order' => 'ASC',
   'hide_empty' => 0,
   'parent' => 0,
  );
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-9 align-self-center">
        <?php $elearning_education_logo_settings = get_theme_mod( 'elearning_education_logo_settings','Different Line');
        if($elearning_education_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) elearning_education_the_custom_logo(); ?>
            <?php if(get_theme_mod('elearning_education_site_title',true) != ''){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <?php if(get_theme_mod('elearning_education_site_tagline',true) != ''){ ?>
                <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($elearning_education_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-md-center">
                <?php if( has_custom_logo() ) elearning_education_the_custom_logo(); ?>                
              </div>
              <div class="col-lg-7 col-md-7 align-self-md-center">
                <?php if(get_theme_mod('elearning_education_site_title',true) != ''){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                  <?php if(get_theme_mod('elearning_education_site_tagline',true) != ''){ ?>
                    <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-4 col-3 align-self-center">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      </div>
      <div class="col-lg-2 col-md-4 align-self-center text-md-right text-center my-3 my-md-0">
        <?php if( get_theme_mod( 'elearning_education_register_button_link' ) != '' || get_theme_mod( 'elearning_education_register_button' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_register_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'elearning_education_register_button','' ) ); ?></a>
        <?php } ?>
      </div>
    </div>
  </div> 
</div>