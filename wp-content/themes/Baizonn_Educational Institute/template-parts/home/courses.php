<?php
/**
 * Template part for displaying Online Courses section
 *
 * @package Educational Institute
 * @subpackage educational_institute
 */
?>

<section id="online-courses" class="text-center py-5">
  <div class="container">
    <?php if( get_theme_mod( 'elearning_education_online_courses_heading' ) != '') { ?>
      <h2><?php echo esc_html(get_theme_mod('elearning_education_online_courses_heading')); ?><hr></h2>
    <?php }?>
    <?php if( get_theme_mod( 'elearning_education_online_courses_sub_heading' ) != '') { ?>
      <p class="mb-0"><?php echo esc_html(get_theme_mod('elearning_education_online_courses_sub_heading')); ?></p>
    <?php }?>
    <?php if ( class_exists( 'LearnPress' ) ) {?>
      <div class="row pt-5">
        <?php
          $args = array(
            'post_type' => 'lp_course',
            'posts_per_page' => get_theme_mod('elearning_education_online_courses_per_page'),
            'course_category' => get_theme_mod('elearning_education_online_courses_category'), 
            'order' => 'ASC'
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $post;
          $course = LP_Global::course();
          $price = $course->get_price_html();
          $lessons = $course->get_items( LP_LESSON_CPT );
          $lessons  = count( $lessons );
          $students = $course->count_students();?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="courses-box text-left mb-4">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
              <div class="courses-box-content">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php $excerpt = get_the_excerpt();echo esc_html( elearning_education_string_limit_words( $excerpt,18 ) ); ?></p>
                <div class="courses-info">
                  <strong class="mr-2 course-price"><?php echo esc_html($course->get_origin_price_html()); ?></strong>
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Know More','educational-institute'); ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      </div>
    <?php }?>
  </div>
</section>