<?php

/**
 * Underground Comics Theme Customizer
 *
 *
 * @package Underground Comics
 */

function underground_comics_customizer($wp_customize)
{
    // Copyright Section

    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title'         =>  'Copyright Settings',
            'description'   =>  'Copyright Section'
        )
    );
    // Field 1 - Copyright Text Box
    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type'                  =>  'theme_mod',
            'default'               =>  '',
            'sanitize_callback'     => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'set_copyright',
        array(
            'label'         =>  'Copyright',
            'description'   =>  'Please add your copyright info here.',
            'section'       =>  'sec_copyright',
            'type'          =>  'text'
        )
    );

    /*--------------------------------------------*/
    //  Slider Section

    $wp_customize->add_section(
        'sec_slider',
        array(
            'title'         =>  'Slider Settings',
            'description'   =>  'Slider Section'
        )
    );
    //Loop trough to create slide fields
    $slides = 3;
    for ($x = 1; $x <= $slides; $x++) {

        // Field - Slider

        $wp_customize->add_setting(
            'set_slider_page' . $x,
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'absint'
            )
        );
        $wp_customize->add_control(
            'set_slider_page' . $x,
            array(
                'label'         =>  'Set slider page ' . $x,
                'description'   =>  'Select page ' . $x,
                'section'       =>  'sec_slider',
                'type'          =>  'dropdown-pages'
            )
        );

        // Field - Slider Button Text

        $wp_customize->add_setting(
            'set_slider_button_text' . $x,
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'set_slider_button_text' . $x,
            array(
                'label'         =>  'Button Text for Page ' . $x,
                'description'   =>  'Text ' . $x,
                'section'       =>  'sec_slider',
                'type'          =>  'text'
            )
        );

        // Field - Slider Button URL

        $wp_customize->add_setting(
            'set_slider_button_url' . $x,
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'set_slider_button_url' . $x,
            array(
                'label'         =>  'URL for Page ' . $x,
                'description'   =>  'URL ' . $x,
                'section'       =>  'sec_slider',
                'type'          =>  'url'
            )
        );
    }
     /*--------------------------------------------*/
    //  Home Page Settings

    $wp_customize->add_section(
        'sec_home_page',
        array(
            'title'         =>  'Home Page Product Settings',
            'description'   =>  'Home Page Section'
        )
    );
        /*--------------------------------------------*/
        // Max Products
        $wp_customize->add_setting(
            'set_popular_max_num',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'absint'
            )
        );
        $wp_customize->add_control(
            'set_popular_max_num',
            array(
                'label'         =>  'Popular Products Max Number',
                'description'   =>  'Enter Number',
                'section'       =>  'sec_home_page',
                'type'          =>  'number'
            )
        );
        // Popular Max Columns
        $wp_customize->add_setting(
            'set_popular_max_col',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'absint'
            )
        );
        $wp_customize->add_control(
            'set_popular_max_col',
            array(
                'label'         =>  'Popular Products Max Columns',
                'description'   =>  'Enter Number',
                'section'       =>  'sec_home_page',
                'type'          =>  'number'
            )
        );
        /*--------------------------------------------*/
        // New Arrivals
        $wp_customize->add_setting(
            'set_new_arrivals_max_num',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'absint'
            )
        );
        $wp_customize->add_control(
            'set_new_arrivals_max_num',
            array(
                'label'         =>  'New Arrivals Max Number',
                'description'   =>  'Enter Number',
                'section'       =>  'sec_home_page',
                'type'          =>  'number'
            )
        );
        // New Arrivals Max Columns
        $wp_customize->add_setting(
            'set_new_arrivals_max_col',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'absint'
            )
        );
        $wp_customize->add_control(
            'set_new_arrivals_max_col',
            array(
                'label'         =>  'New Arrivals Max Columns',
                'description'   =>  'Enter Number',
                'section'       =>  'sec_home_page',
                'type'          =>  'number'
            )
        );
         /*--------------------------------------------*/
        // Show Deal
        $wp_customize->add_setting(
            'set_show_featured_item',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'underground_comics_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(
            'set_show_featured_item',
            array(
                'label'         =>  'Show Featured Item',
                'description'   =>  '',
                'section'       =>  'sec_home_page',
                'type'          =>  'checkbox'
            )
        );
         /*--------------------------------------------*/
        // Featured Product ID
        $wp_customize->add_setting(
            'set_featured',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'absint'
            )
        );
        $wp_customize->add_control(
            'set_featured',
            array(
                'label'         =>  'Featured Item',
                'description'   =>  'Enter Product ID',
                'section'       =>  'sec_home_page',
                'type'          =>  'number'
            )
        );
         // Featured Product Author
         $wp_customize->add_setting(
            'set_featured_author',
            array(
                'type'                  =>  'theme_mod',
                'default'               =>  '',
                'sanitize_callback'     =>  'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'set_featured_author',
            array(
                'label'         =>  'Featured Item Author',
                'description'   =>  "Enter the Author's Name",
                'section'       =>  'sec_home_page',
                'type'          =>  'text'
            )
        );
        
}
add_action('customize_register', 'underground_comics_customizer');

function underground_comics_sanitize_checkbox( $checked ){
    return ( ( isset ( $checked ) && true == $checked ) ? true : false );
}