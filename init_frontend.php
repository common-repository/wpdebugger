<?php
	if (get_option('wp_phimind_debugger_show_in_frontend') == 1)
	{
		//QUEUE THE CSS
		@wp_enqueue_style('wp_phimind_debugger_css', WP_PHIMIND_DEBUGGER_ROOT_WEB.'/css/wp_phimind_debugger.css');
	
		//SET THE ACTION FOR THE FOOTER
		add_action('shutdown', array($wp_phimind_debugger, 'debugger_footer'));
	}
?>