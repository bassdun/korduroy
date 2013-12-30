<?php 

function pmai_admin_notices() {
	// notify user if history folder is not writable		
	if ( ! class_exists( 'PMXI_Plugin' ) ) {
		?>
		<div class="error"><p>
			<?php printf(
					__('<b>%s Plugin</b>: WP All Import must be installed. Free edition of WP All Import at <a href="http://wordpress.org/plugins/wp-all-import/" target="_blank">http://wordpress.org/plugins/wp-all-import/</a> and the paid edition at <a href="http://www.wpallimport.com/">http://www.wpallimport.com/</a>', 'PMAI_Plugin'),
					PMAI_Plugin::getInstance()->getName()
			) ?>
		</p></div>
		<?php
		
		deactivate_plugins( PMAI_ROOT_DIR . '/plugin.php');
		
	}

	if ( class_exists( 'PMXI_Plugin' ) and version_compare(PMXI_VERSION, '3.3.1') <= 0 ) {
		?>
		<div class="error"><p>
			<?php printf(
					__('<b>%s Plugin</b>: WP All Import higher than 3.3.1 must be installed', 'pmai_plugin'),
					PMAI_Plugin::getInstance()->getName()
			) ?>
		</p></div>
		<?php
		
		deactivate_plugins( PMAI_ROOT_DIR . '/plugin.php');
	}

	if ( ! class_exists( 'acf' ) ) {
		?>
		<div class="error"><p>
			<?php printf(
					__('<b>%s Plugin</b>: <a target="_blank" href="http://wordpress.org/plugins/advanced-custom-fields/">Advanced Custom Fields</a> must be installed', 'pmai_plugin'),
					PMAI_Plugin::getInstance()->getName()
			) ?>
		</p></div>
		<?php
		
		deactivate_plugins( PMAI_ROOT_DIR . '/plugin.php');
		
	}

	$input = new PMAI_Input();
	$messages = $input->get('pmai_nt', array());
	if ($messages) {
		is_array($messages) or $messages = array($messages);
		foreach ($messages as $type => $m) {
			in_array((string)$type, array('updated', 'error')) or $type = 'updated';
			?>
			<div class="<?php echo $type ?>"><p><?php echo $m ?></p></div>
			<?php 
		}
	}
}