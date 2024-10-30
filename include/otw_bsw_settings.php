<?php

	global $otw_bsw_plugin_id;
	
	$otw_bsw_plugin_options = get_option( 'otw_bsw_plugin_options' );
	
	//pupulate form values
	$db_values = array();
	
	$db_values['otw_bsw_promotions'] = get_option( $otw_bsw_plugin_id.'_dnms' );
	
	if( empty( $db_values['otw_bsw_promotions'] ) ){
		$db_values['otw_bsw_promotions'] = 'on';
	}


$message = '';
$massages = array();
$messages[1] = esc_html__( 'Settings saved', 'otw_bsw' );

if( otw_get('message',false) && isset( $messages[ otw_get('message','') ] ) ){
	$message .= $messages[ otw_get('message','') ];
}
?>
<?php if ( $message ) : ?>
<div id="message" class="updated"><p><?php echo esc_html( $message ); ?></p></div>
<?php endif; ?>
<div class="wrap">
	<div id="icon-edit" class="icon32"><br/></div>
	<h2>
		<?php esc_html_e('Plugin Settings', 'otw_bsw') ?>
	</h2>
	<div class="form-wrap otw_bsw_options" id="poststuff">
		<form method="post" action="" class="validate">
			<input type="hidden" name="otw_bsw_action" value="otw_bsw_settings_action" />
			<?php wp_original_referer_field(true, 'previous'); wp_nonce_field('otw-bsw-settings'); ?>
			<div id="post-body">
				<div id="post-body-content">
					<?php include_once( 'otw_bsw_help.php' );?>
				
					<div class="form-field">
						<label for="otw_bsw_promotions"><?php esc_html_e('Show OTW Promotion Messages in my WordPress admin', 'otw_bsw'); ?></label>
						<select id="otw_bsw_promotions" name="otw_bsw_promotions">
							<option value="on" <?php echo ( isset( $db_values['otw_bsw_promotions'] ) && ( $db_values['otw_bsw_promotions'] == 'on' ) )? 'selected="selected"':''?>>on(default)</option>
							<option value="off"<?php echo ( isset( $db_values['otw_bsw_promotions'] ) && ( $db_values['otw_bsw_promotions'] == 'off' ) )? 'selected="selected"':''?>>off</option>
						</select>
					</div>
					<p class="submit">
						<input type="submit" value="<?php esc_html_e( 'Save Settings', 'otw_bsw') ?>" name="submit" class="button"/>
					</p>
				</div>
			</div>
			
		</form>
	</div>
</div>

