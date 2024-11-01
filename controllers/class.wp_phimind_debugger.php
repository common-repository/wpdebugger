<?php 
	class wp_phimind_debugger extends wp_phimind_debugger_controller_extension
	{
		function __construct()
		{
			parent::__construct();

			//WORDPRESS CONSTANT TO MONITOR SQL QUERIES
			define('SAVEQUERIES', true);

			//GET THE CURRENT USER DATA
			require (ABSPATH.WPINC.'/pluggable.php');
			global $current_user;
			get_currentuserinfo();
		}

		function debugger_set_menu()
		{
			add_submenu_page('wp_phimind', 'Debugger', 'Debugger', 'edit_plugins', 'wpdebugger', array($this, 'debugger_index'));
		}

		function debugger_index()
		{
			require(WP_PHIMIND_DEBUGGER_ROOT.'/views/index.php');
		}

		function debugger_update_configuration()
		{
			update_option('wp_phimind_debugger_show_in_admin', @$this->params["data"]["wp_phimind_debugger_show_in_admin"]);
			update_option('wp_phimind_debugger_show_in_frontend', @$this->params["data"]["wp_phimind_debugger_show_in_frontend"]);
			update_option('wp_phimind_debugger_database_queries', @$this->params["data"]["wp_phimind_debugger_database_queries"]);
			update_option('wp_phimind_debugger_database_queries_aditional_objects', @$this->params["data"]["wp_phimind_debugger_database_queries_aditional_objects"]);
			update_option('wp_phimind_debugger_database_queries_aditional_objects_names', @$this->params["data"]["wp_phimind_debugger_database_queries_aditional_objects_names"]);
			update_option('wp_phimind_debugger_rewrite_rules', @$this->params["data"]["wp_phimind_debugger_rewrite_rules"]);
			update_option('wp_phimind_debugger_get_variables', @$this->params["data"]["wp_phimind_debugger_get_variables"]);
			update_option('wp_phimind_debugger_post_variables', @$this->params["data"]["wp_phimind_debugger_post_variables"]);
			update_option('wp_phimind_debugger_cookies_variables', @$this->params["data"]["wp_phimind_debugger_cookies_variables"]);
			update_option('wp_phimind_debugger_request_variables', @$this->params["data"]["wp_phimind_debugger_request_variables"]);
			update_option('wp_phimind_debugger_server_variables', @$this->params["data"]["wp_phimind_debugger_server_variables"]);
			update_option('wp_phimind_debugger_env_variables', @$this->params["data"]["wp_phimind_debugger_env_variables"]);
			update_option('wp_phimind_debugger_files_variables', @$this->params["data"]["wp_phimind_debugger_files_variables"]);
			update_option('wp_phimind_debugger_globals_variables', @$this->params["data"]["wp_phimind_debugger_globals_variables"]);
		}

		function debugger_footer()
		{
			require(WP_PHIMIND_DEBUGGER_ROOT.'/views/footer_main.php');
		}

		static function activate()
		{
			update_option('wp_phimind_debugger_version', WP_PHIMIND_DEBUGGER_VERSION);
		}

		static function deactivate()
		{
			delete_option('wp_phimind_debugger_version');
			delete_option('wp_phimind_debugger_show_in_admin');
			delete_option('wp_phimind_debugger_show_in_frontend');
			delete_option('wp_phimind_debugger_database_queries');
			delete_option('wp_phimind_debugger_database_queries_aditional_objects');
			delete_option('wp_phimind_debugger_database_queries_aditional_objects_names');
			delete_option('wp_phimind_debugger_rewrite_rules');
			delete_option('wp_phimind_debugger_get_variables');
			delete_option('wp_phimind_debugger_post_variables');
			delete_option('wp_phimind_debugger_cookies_variables');
			delete_option('wp_phimind_debugger_request_variables');
			delete_option('wp_phimind_debugger_server_variables');
			delete_option('wp_phimind_debugger_env_variables');
			delete_option('wp_phimind_debugger_files_variables');
			delete_option('wp_phimind_debugger_globals_variables');
		}

	}

?>