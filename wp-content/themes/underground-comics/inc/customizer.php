<?php

/**
 * Underground Comics Theme Customizer
 *
 *
 * @package Underground Comics
 */

function underground_comics_customizer($wp_customize)
{
    /*--------------------- Home Page Video -----------------------*/

    $wp_customize->add_section(
        'sec_video',
        array(
            'title'         =>  'Home Page VIDEO',
            'description'   =>  'Home Page Video Section'
        )
    );

    // Field - Slider

    $wp_customize->add_setting(
        'set_home_video',
        array(
            'type'                  =>  'theme_mod',
            'default'               =>  'http://',
            'sanitize_callback'     =>  'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        'set_home_video',
        array(
            'label'         =>  'Set home page video',
            'description'   =>  'enter full url ex."http://www.youtube.com/video',
            'section'       =>  'sec_video',
            'type'          =>  'url'
        )
    );
   
    /*--------------------- Footer Menu Settings -----------------------*/

    $wp_customize->add_section(
        'sec_footer',
        array(
            'title'         =>  'Footer Settings',
            'description'   =>  'Footer Section'
        )
    );
    // Field 1 - Copyright Text Box
    $wp_customize->add_setting(
        'set_footer_email',
        array(
            'type'                  =>  'theme_mod',
            'default'               =>  '',
            'sanitize_callback'     => 'sanitize_email'
        )
    );
    $wp_customize->add_control(
        'set_footer_email',
        array(
            'label'         =>  'Email Link in footer menu',
            'description'   =>  'Please add your email.',
            'section'       =>  'sec_footer',
            'type'          =>  'email'
        )
    );

     /*--------------------- Remove Shopping Cart -----------------------*/


    
     $wp_customize->add_section(
        'sec_cart',
        array(
            'title'         =>  'Remove Shopping Cart ',
            'description'   =>  'De-selecting this replaces the shopping cart with an email link'
        )
    );

    $wp_customize->add_setting(
        'set_cart',
        array(
            'type'                  =>  'theme_mod',
            'default'               =>  '',
            'sanitize_callback'     =>  'underground_comics_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'set_cart', array(
            'label'			=> 'Show Cart',
            'section'		=> 'sec_cart',
            'type'			=> 'checkbox'
        )
    );
}
add_action('customize_register', 'underground_comics_customizer');

function underground_comics_sanitize_checkbox($checked)
{
    return ((isset($checked) && true == $checked) ? true : false);
}
