<?php
function pmai_pmxi_reimport($entry, $post){	

	$acfs = get_posts(array('posts_per_page' => -1, 'post_type' => 'acf'));

	$all_existing_acf = array();

	if ( ! empty($acfs) ){

		foreach ($acfs as $key => $acf) {

			foreach (get_post_meta($acf->ID, '') as $cur_meta_key => $cur_meta_val)
			{	
				if (strpos($cur_meta_key, 'field_') !== 0) continue;

				$field = (!empty($cur_meta_val[0])) ? unserialize($cur_meta_val[0]) : array();

				$field_name = '[' . $field['name'] . '] ' . $field['label'];

				if ( ! in_array($field_name, $all_existing_acf) ) $all_existing_acf[] = $field_name;
			}
		}

	}

	?>
	<div class="input">
		<input type="hidden" name="acf_list" value="0" />			
		<input type="hidden" name="is_update_acf" value="0" />
		<input type="checkbox" id="is_update_acf_<?php echo $entry; ?>" name="is_update_acf" value="1" <?php echo $post['is_update_acf'] ? 'checked="checked"': '' ?>  class="switcher"/>
		<label for="is_update_acf_<?php echo $entry; ?>"><?php _e('Advanced Custom Fields', 'pmxi_plugin') ?></label>		
		<div class="switcher-target-is_update_acf_<?php echo $entry; ?>" style="padding-left:17px;">
			<div class="input">
				<input type="radio" id="update_acf_logic_full_update_<?php echo $entry; ?>" name="update_acf_logic" value="full_update" <?php echo ( "full_update" == $post['update_acf_logic'] ) ? 'checked="checked"': '' ?> class="switcher"/>
				<label for="update_acf_logic_full_update_<?php echo $entry; ?>"><?php _e('Update all ACF', 'pmxi_plugin') ?></label>								
			</div>
			<div class="input">
				<input type="radio" id="update_acf_logic_only_<?php echo $entry; ?>" name="update_acf_logic" value="only" <?php echo ( "only" == $post['update_acf_logic'] ) ? 'checked="checked"': '' ?> class="switcher"/>
				<label for="update_acf_logic_only_<?php echo $entry; ?>"><?php _e('Update only these ACF, leave the rest alone', 'pmxi_plugin') ?></label>								
				<div class="switcher-target-update_acf_logic_only_<?php echo $entry; ?> pmxi_choosen" style="padding-left:17px;">										
					
					<span class="hidden choosen_values"><?php if (!empty($all_existing_acf)) echo implode(',', $all_existing_acf);?></span>
					<input class="choosen_input" value="<?php if (!empty($post['acf_list']) and "only" == $post['update_acf_logic']) echo implode(',', $post['acf_list']); ?>" type="hidden" name="acf_only_list"/>																				
				</div>
			</div>
			<div class="input">
				<input type="radio" id="update_acf_logic_all_except_<?php echo $entry; ?>" name="update_acf_logic" value="all_except" <?php echo ( "all_except" == $post['update_acf_logic'] ) ? 'checked="checked"': '' ?> class="switcher"/>
				<label for="update_acf_logic_all_except_<?php echo $entry; ?>"><?php _e('Leave these ACF alone, update all other ACF', 'pmxi_plugin') ?></label>								
				<div class="switcher-target-update_acf_logic_all_except_<?php echo $entry; ?> pmxi_choosen" style="padding-left:17px;">
					
					<span class="hidden choosen_values"><?php if (!empty($all_existing_acf)) echo implode(',', $all_existing_acf);?></span>
					<input class="choosen_input" value="<?php if (!empty($post['acf_list']) and "all_except" == $post['update_acf_logic']) echo implode(',', $post['acf_list']); ?>" type="hidden" name="acf_except_list"/>																														
				</div>
			</div>
		</div>
	</div>	
	<?php
}
?>