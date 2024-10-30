<?php
/**
 * Process otw cm actions
 *
 */
if( otw_post( 'otw_bsw_action', false ) ){
	
	require_once( ABSPATH . WPINC . '/pluggable.php' );
	
	switch( otw_post( 'otw_bsw_action', '' ) ){
		
		case 'otw_bsw_settings_action':
				
				global $wp_cm_tmc_items, $wp_cm_agm_items, $otw_bsw_skins, $wp_cm_cs_items;
				
				$options = array();
				
				if( otw_post( 'otw_bsw_promotions', false ) && !empty( otw_post( 'otw_bsw_promotions', '' ) ) ){
					
					global $otw_bsw_factory_object, $otw_bsw_plugin_id;
					
					update_option( $otw_bsw_plugin_id.'_dnms', otw_post( 'otw_bsw_promotions', '' ) );
					
					if( is_object( $otw_bsw_factory_object ) ){
						$otw_bsw_factory_object->retrive_plungins_data( true );
					}
				}
				
				update_option( 'otw_bsw_plugin_options', $options );
				wp_redirect( admin_url( 'admin.php?page=otw-bsw-settings&message=1' ) );
			break;
	}
}
?>