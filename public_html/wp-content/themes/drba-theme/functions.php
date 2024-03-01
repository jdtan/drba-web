
<?php

function custom_firebase_func($atts)
{
    return "<div id='custom-firebase'>Test</div>";
}
add_shortcode('custom_firebase', 'custom_firebase_func');

function custom_firebase_scripts_function()
{
 wp_enqueue_script('custom_firebase', get_stylesheet_directory_uri() . '/js/custom-firebase.js', array('firebase_app', 'firebase_auth', 'firebase_database', 'firebase_firestore', 'firebase'));
//  wp_enqueue_script('custom_firebase', get_template_directory_uri() . '/js/custom-firebase.js', array('firebase_app', 'firebase_auth', 'firebase_database', 'firebase_firestore', 'firebase'));
}
add_action('wp_enqueue_scripts', 'custom_firebase_scripts_function');



