
<link rel='stylesheet' href='<?php echo WP_PHIMIND_DEBUGGER_ROOT_WEB;?>/css/wp_phimind_debugger.css' type='text/css' media='all' />

<script>
	jQuery(document).ready(function($) {

		current_menu = 'wpkam_config_block_1';

		//MENU EVENTS
		$('.wp_phimind_debugger_submenu > li > a').bind('click', function() {
			$('.wp_phimind_debugger_submenu > li').removeClass('wp_phimind_debugger_current_menu');
			$(this).parent().addClass('wp_phimind_debugger_current_menu');
			$('.wp_phimind_debugger_configuration_content_block').hide();
			$('#' + $(this).attr("rel")).show();
		});
		//MENU EVENTS

	});
</script>

	<?php if (@$_REQUEST["updated"] == 1):?>
		<div class="updated"><p>Your data has been updated</p></div>
	<?php endif;?>
	<h2>WP PhiMind Debugger</h2>
	<div id="wp_phimind_debugger_listing">
		<ul class="wp_phimind_debugger_submenu">
			<li class="wp_phimind_debugger_current_menu"><a href="javascript:void(0);" rel="wp_phimind_debugger_config_block_1">Debugging Configuration</a></li>
			<li><a href="javascript:void(0);" rel="wp_phimind_debugger_config_block_2">F.A.Q.</a></li>
		</ul>
		<div class="clear wp_phimind_debugger_configuration_content_blocks" id="wp_phimind_debugger_configuration_content_blocks">
			<div class="clear wp_phimind_debugger_configuration_content_block" id="wp_phimind_debugger_config_block_1"><?php require_once(WP_PHIMIND_DEBUGGER_ROOT.'/views/index_configuration_block_1.php');?></div>
			<div class="clear wp_phimind_debugger_configuration_content_block" id="wp_phimind_debugger_config_block_2" style='display:none'><?php require_once(WP_PHIMIND_DEBUGGER_ROOT.'/views/index_configuration_block_2.php');?></div>
		</div>
	</div>
