<?php 

    if ( is_plugin_active( 'wp-museum/wp-museum.php' ) ) {
        include(WP_PLUGIN_DIR . '/wp-museum/public/partials/wp-museum-public-display.php');
    } else {
        echo 'Please install and activate the WP-MUSEUM plugin to view records.';
    }
    
?>
