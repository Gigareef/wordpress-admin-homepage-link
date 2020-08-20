<?php
/*
Plugin Name: Homepage Admin Shortcut
Description: Make a nav menu link on dashboard for homepage edit
Author: Michael Maffattone
Author URI: https://gigareef.com/
Version: 1.0
Text Domain: homepage-admin-shortcut
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class HomepageAdminShortcut {
  public function __construct() {
    add_action('admin_menu', array($this, 'homepage_menu_item'));
  }
   
  public function homepage_menu_item () {
    add_menu_page( 'Homepage', 'Homepage', 'manage_options', $this->get_front_page_edit_link(), '', 'dashicons-admin-home', 5 );
  }

  public function get_front_page_edit_link () {
    $homepageID = get_option('page_on_front'); 
    return get_edit_post_link($homepageID);
  }
}
 
new HomepageAdminShortcut();

