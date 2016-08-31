<?phpfunction remove_acf_menu() {		remove_menu_page('edit.php?post_type=acf');	}	add_action( 'admin_menu', 'remove_acf_menu', 999);function hide_plugins_network( $plugins ) {    // let's hide akismet    if( in_array( 'acf-options-page/acf-options-page.php', array_keys( $plugins ) ) ) {        unset( $plugins['acf-options-page/acf-options-page.php'] );    }    if( in_array( 'acf-repeater/acf-repeater.php', array_keys( $plugins ) ) ) {        unset( $plugins['acf-repeater/acf-repeater.php'] );    }    if( in_array( 'advanced-custom-fields/acf.php', array_keys( $plugins ) ) ) {        unset( $plugins['advanced-custom-fields/acf.php'] );    }    if(in_array('gravityforms/gravityforms.php', array_keys( $plugins))){        unset($plugins['gravityforms/gravityforms.php']);    }       if(in_array('polylang/polylang.php', array_keys( $plugins))){        unset($plugins['polylang/polylang.php']);    }    if(in_array('usernoise/usernoise.php', array_keys( $plugins))){        unset($plugins['usernoise/usernoise.php']);    }    if(in_array('gravity-forms-sticky-list/sticky-list.php', array_keys( $plugins))){        unset($plugins['gravity-forms-sticky-list/sticky-list.php']);    }    if(in_array('gravityformsuserregistration/userregistration.php', array_keys( $plugins))){        unset($plugins['gravityformsuserregistration/userregistration.php']);    }    if(in_array('wp-mail-smtp/wp_mail_smtp.php', array_keys( $plugins))){        unset($plugins['wp-mail-smtp/wp_mail_smtp.php']);    }    if(in_array('all-in-one-wp-security-and-firewall/wp-security.php', array_keys( $plugins))){        unset($plugins['all-in-one-wp-security-and-firewall/wp-security.php']);    }        return $plugins;}add_filter( 'all_plugins', 'hide_plugins_network' );function disable_changing_theme_for_all() {	global $submenu, $userdata;	get_currentuserinfo();//	if ($userdata->ID != 1) {		unset($submenu['themes.php'][5]);                remove_submenu_page( 'index.php', 'update-core.php');                //	}}add_action('admin_init', 'disable_changing_theme_for_all');function remove_core_updates(){global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);}add_filter('pre_site_transient_update_core','remove_core_updates');add_filter('pre_site_transient_update_plugins','remove_core_updates');add_filter('pre_site_transient_update_themes','remove_core_updates');//function exclude_pages_from_admin($query) { //  if ( ! is_admin() )//    return $query; //  global $pagenow, $post_type; //  if ( current_user_can( 'administrator' ) && $pagenow == 'edit.php' && $post_type == 'page' )//    $query->query_vars['post__not_in'] = array( '153', '92', '96' ); // Enter your page IDs here//}//add_filter( 'parse_query', 'exclude_pages_from_admin' );function replace_howdy( $wp_admin_bar ) {    $my_account=$wp_admin_bar->get_node('my-account');    $newtitle = str_replace( 'Howdy,', 'Hello, welcome back', $my_account->title );    $wp_admin_bar->add_node( array(        'id' => 'my-account',        'title' => $newtitle,    ) );}add_filter( 'admin_bar_menu', 'replace_howdy',25 );function no_wp_logo_admin_bar_remove() {    global $wp_admin_bar;//    pr($wp_admin_bar);    $wp_admin_bar->remove_menu('wp-logo');    $wp_admin_bar->remove_menu('new-content'); // Remove the content link    $wp_admin_bar->remove_menu('comments'); // Remove the comments link    $wp_admin_bar->remove_menu('languages'); //Remove the polylang "Show all languages"}add_action('wp_before_admin_bar_render', 'no_wp_logo_admin_bar_remove', 0);// Replace Admin Dashboard Logo//  function wp_admin_dashboard_custom_logo() {// echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/admin_logo.png) !important; }</style>';// echo '//        <style type="text/css">//            #wp-admin-bar-wp-logo .ab-icon:before{ content:"" !important; }//            #wp-admin-bar-wp-logo .ab-icon{ background-image: url('.get_bloginfo('template_directory').'/images/admin_logo.png) !important; }//        </style>//    '; // }//add_action('admin_head', 'wp_admin_dashboard_custom_logo');// remove menusfunction remove_menus () {global $menu;//pr($menu);//		$restricted = array(('Links'), __('Tools')/*,__('Pages')*/,__('Comments'),__('Posts') /*,__('Appearance')*//*, __('Media')*//*,__('Plugins')*/, __('Settings')/*,__('Mega Menu')*/);                $restricted = array(('Links'), __('Tools'),__('Appearance')/*,__('Plugins')*/);		end ($menu);		while (prev($menu)){			$value = explode(' ',$menu[key($menu)][0]);			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}		}//                $menu_slug = 'maxmegamenu';//                remove_menu_page( $menu_slug );  //remove 'Mega Menu'}add_action('admin_menu', 'remove_menus');function remove_menu_links() {         remove_submenu_page( 'gf_edit_forms', 'gf_edit_forms' );          remove_submenu_page( 'gf_edit_forms', 'gf_new_form' );         // remove_submenu_page( 'gf_edit_forms', 'gf_new_formf_help' );         // remove_submenu_page( 'gf_edit_forms', 'gf_entries' );          remove_submenu_page( 'gf_edit_forms', 'gf_settings' );         // remove_submenu_page( 'gf_edit_forms', 'gf_export' );          remove_submenu_page( 'gf_edit_forms', 'gf_update' );          remove_submenu_page( 'gf_edit_forms', 'gf_addons' );         remove_submenu_page( 'gf_edit_forms', 'gf_help' ); }add_action( 'admin_menu', 'remove_menu_links', 9999 );/* It will remove the tabs */add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );function mytheme_remove_help_tabs($old_help, $screen_id, $screen){    $screen->remove_help_tabs();    return $old_help;}add_filter('screen_options_show_screen', '__return_false');?>