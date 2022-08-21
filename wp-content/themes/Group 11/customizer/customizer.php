<?php

function educational_institute_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'elearning_education_color_option' );

    $wp_customize->remove_setting( 'elearning_education_login_button' );
    $wp_customize->remove_control( 'elearning_education_login_button' );

    $wp_customize->remove_setting( 'elearning_education_login_button_link' );
    $wp_customize->remove_control( 'elearning_education_login_button_link' );

    $wp_customize->remove_setting( 'elearning_education_header_teacher' );
    $wp_customize->remove_control( 'elearning_education_header_teacher' );

    $wp_customize->remove_setting( 'elearning_education_header_wishlist_url' );
    $wp_customize->remove_control( 'elearning_education_header_wishlist_url' );
}
add_action( 'customize_register', 'educational_institute_remove_customize_register', 11 );

function educational_institute_customize_register( $wp_customize ) {

}
add_action( 'customize_register', 'educational_institute_customize_register' );
