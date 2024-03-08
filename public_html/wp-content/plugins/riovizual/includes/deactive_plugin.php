<?php 

// deactive plugin after taking feedback
function rio_viz_feedback_deactivate_plugin_callback() {
    if (current_user_can('activate_plugins')) {
        $plugin_file = 'riovizual/riovizual.php';
        deactivate_plugins($plugin_file);
        echo 'success';
    } else {
        echo 'error';
    }
    wp_die();
}

add_action( 'wp_ajax_deactivate_plugin','rio_viz_feedback_deactivate_plugin_callback');