<?php
    //======================================================================
    // Customize ACF JSON save folder
    //======================================================================
    function acf_json_save_point( $path ) {
        
        // update path
        $path = get_stylesheet_directory() . '/functions/acf/json/';
        
        // return
        return $path;
        
    }
    add_filter('acf/settings/save_json', 'acf_json_save_point');

    //======================================================================
    // Customize ACF JSON load folder
    //======================================================================
    function acf_json_load_point( $paths ) {
        
        // remove original path (optional)
        unset($paths[0]);
        
        // append path
        $paths[] = get_stylesheet_directory() . '/functions/acf/json/';
        
        // return
        return $paths;
        
    }
    add_filter('acf/settings/load_json', 'acf_json_load_point');
    
    //======================================================================
    // Checking if ACF is Activated
    //======================================================================
    function acf_activated() {
        if (function_exists('get_field')) {
            return true;
        }
        return false;
    }

    //======================================================================
    // SPEED UP ACF
    //======================================================================
    add_filter('acf/settings/remove_wp_meta_box', '__return_true');
    
    //======================================================================
    // ACF Responsive Image
    //======================================================================
    function acf_responsive_image($image_id, $image_size, $max_width) {

        // check the image ID is not blank
        if ($image_id != '') {

            // set the default src image size
            $image_src = wp_get_attachment_image_url($image_id, $image_size);

            // set the srcset with various image sizes
            $image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);

            // generate the markup for the responsive image
            echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
        }
    }

	//======================================================================
    // ADD OPTIONS PAGE
    //======================================================================
	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_page( array(
			'page_title'	=> 'Site Options',
			'menu_title'	=> 'Site Options',
			'menu_slug' 	=> 'acf-site-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
		));
	
    }

//======================================================================
// ACF Bidirectional Relationship
//======================================================================


function bidirectional_acf_update_value( $value, $post_id, $field  ) {

    // vars
    $field_name = $field['name'];
    $field_key = $field['key'];
    $global_name = 'is_updating_' . $field_name;
    
    
    // bail early if this filter was triggered from the update_field() function called within the loop below
    // - this prevents an inifinte loop
    if( !empty($GLOBALS[ $global_name ]) ) return $value;
    
    
    // set global variable to avoid inifite loop
    // - could also remove_filter() then add_filter() again, but this is simpler
    $GLOBALS[ $global_name ] = 1;
    
    
    // loop over selected posts and add this $post_id
    if( is_array($value) ) {
    
        foreach( $value as $post_id2 ) {
            
            // load existing related posts
            $value2 = get_field($field_name, $post_id2, false);
            
            
            // allow for selected posts to not contain a value
            if( empty($value2) ) {
                
                $value2 = array();
                
            }
            
            
            // bail early if the current $post_id is already found in selected post's $value2
            if( in_array($post_id, $value2) ) continue;
            
            
            // append the current $post_id to the selected post's 'related_posts' value
            $value2[] = $post_id;
            
            
            // update the selected post's value (use field's key for performance)
            update_field($field_key, $value2, $post_id2);
            
        }
    
    }
    
    
    // find posts which have been removed
    $old_value = get_field($field_name, $post_id, false);
    
    if( is_array($old_value) ) {
        
        foreach( $old_value as $post_id2 ) {
            
            // bail early if this value has not been removed
            if( is_array($value) && in_array($post_id2, $value) ) continue;
            
            
            // load existing related posts
            $value2 = get_field($field_name, $post_id2, false);
            
            
            // bail early if no value
            if( empty($value2) ) continue;
            
            
            // find the position of $post_id within $value2 so we can remove it
            $pos = array_search($post_id, $value2);
            
            
            // remove
            unset( $value2[ $pos] );
            
            
            // update the un-selected post's value (use field's key for performance)
            update_field($field_key, $value2, $post_id2);
            
        }
        
    }
    
    
    // reset global varibale to allow this filter to function as per normal
    $GLOBALS[ $global_name ] = 0;
    
    
    // return
    return $value;
    
}

add_filter('acf/update_value/name=related_posts', 'bidirectional_acf_update_value', 10, 3);