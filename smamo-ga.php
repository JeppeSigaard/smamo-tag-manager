<?php 

/*
    Plugin name: Smamo GA
    Description: Indsæt sporingskode til google analytics. kræver <a href="http://kirki.org">Kirki</a>
    Author: SmartMonkey
    Author URI: http://smartmonkey.dk
    Version: 1.0.0
*/

if(class_exists('KIRKI')){
    
    Kirki::add_section( 'tracking', array(
        'title'          => __( 'Google Analytics' ),
        'description'    => __( 'Tilføj sporingskode til Google Analytics' ),
        'panel'          => '', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    
    Kirki::add_field( 'ga_ID', array(
        'settings' => 'ga_ID',
        'label'    => __( 'Sporingskode', 'smamo' ),
        'section'  => 'tracking',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
    if(get_theme_mod('ga_ID') !== ''){
        add_action('wp_footer',function(){echo "<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', '". get_theme_mod('ga_ID') ."', 'auto'); ga('send', 'pageview');</script>";});
    }
}