<?php

require_once NB_PLUGIN_DIR . '/classes/class-add-post-type.php';

require_once NB_PLUGIN_DIR . '/classes/class-meta-box.php';

require_once NB_PLUGIN_DIR . '/classes/class-custom-widget.php';

function nb_plugin_settings_link( $links ) {
   $settings_link = '<a href="edit.php?post_type=person">' . __( 'Settings' ) . '</a>';
   	array_push( $links, $settings_link );
   	return $links;
}

add_filter( "plugin_action_links_$plugin", 'nb_plugin_settings_link' );

require_once NB_PLUGIN_DIR . '/classes/class-short-code.php';