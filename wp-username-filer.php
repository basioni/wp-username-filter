<?php

/**
 * Plugin Name: Users Registration Filter
 * Plugin URI: https://www.linkedin.com/in/basioni/
 * Description: Modify Username after user register.
 * Version: 1.0
 * Author: Mr. Basioni
 * Author URI: https://www.linkedin.com/in/basioni/
 * License: GPL3
 * Network: true
 */

if(! defined('ABSPATH')) exit; // Exit if accessed directly 

add_action( 'user_register', 'WP_first_last_username' );

//Function to replace old username with new username compined of Fisrtname + Last Name
function WP_first_last_username( $user_id )
{   
    // Get The user first Name + Last Name
    $data = get_userdata( $user_id );
    if($data->first_name == '' || $data->last_name == '')
    return ;
    $new_user_name = $data->first_name . $data->last_name;
    // Update the username
    global $wpdb;
    $wpdb->update($wpdb->users, array('user_login' => $new_user_name), array('ID' => $user_id));
}
