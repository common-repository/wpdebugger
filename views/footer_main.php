<?php
	global $see_future_posts;
	global $current_user;
	global $wp_rewrite;
	global $wpdb;
	global $wp;

	//ADD THE BASE WPDB VAR
	$array_database_objects = array();
	if (get_option('wp_phimind_debugger_database_queries') == 1)
		array_push($array_database_objects, 'wpdb');

	//GET THE ADDITIONAL DATABASE CONNECTIONS
	if (get_option('wp_phimind_debugger_database_queries_aditional_objects') == 1)
	{
		//GET THE LIST OF DBS AND CLEAN THE SPACES
		$database_list = get_option('wp_phimind_debugger_database_queries_aditional_objects_names');
		$database_list = str_replace(" ", "", $database_list);

		//GET THE GLOBAL INSTANCES OF THESE DBS AND APPEND THEM TO THE DATABASE ARRAYS
		$array_additional_databases = explode(",", $database_list);
		foreach ($array_additional_databases as $additional_database_name)
		{
			global $$additional_database_name;
			array_push($array_database_objects, $additional_database_name);
		}
	}
?>

	<br>
	<br>
	<div class="wp_phimind_debugger_main_table">
		<div class="wp_phimind_debugger_warning">ATTENTION!!! Only LOGGED in users WITH administrative permissions can see this debug information.</div>
		<br>

		<div class="wp_phimind_debugger_main_table_section_header">General Configuration</div>
		<table class="wp_phimind_debugger_data_table">
			<tr>
				<td style="margin:15px;">Current Server Time</td>
				<td><?php echo date("Y-m-d H:i:s");?></td>
			</tr>
			<tr>
				<td align="left" valign="top">Current user</td>
				<td align="left" valign="top"><?php echo $current_user->data->user_nicename;?></td>
			</tr>
			<tr>
				<td align="left" valign="top">Administrator capability?</td>
				<td align="left" valign="top"><?php echo $current_user->allcaps["administrator"];?></td>
			</tr>
			<tr>
				<td align="left" valign="top">View future content?</td>
				<td align="left" valign="top"><?php echo $see_future_posts;?></td>
			</tr>
		</table>
		<br>

		<div class="wp_phimind_debugger_main_table_section_header">Wordpress Request Main Vars</div>
		<table class="wp_phimind_debugger_data_table">
			<tr>
				<td>query_string</td>
				<td><?php echo $wp->query_string?></td>
			</tr>
			<tr>
				<td>request</td>
				<td><?php echo $wp->request?></td>
			</tr>
			<tr>
				<td>matched_rule</td>
				<td><?php echo $wp->matched_rule?></td>
			</tr>
			<tr>
				<td>matched_query</td>
				<td><?php echo $wp->matched_query?></td>
			</tr>
			<tr>
				<td>did_permalink</td>
				<td><?php echo $wp->did_permalink?></td>
			</tr>

			<?php 
			if (is_array($wp->query_vars))
				foreach ($wp->query_vars as $key => $value):?>
				<tr>
					<td>query_vars-><?php echo $key;?></td>
					<td><?php echo $value;?></td>
				</tr>
				<?php endforeach;?>
		</table>
		<br>

		<?php if (!empty($array_database_objects)):
			foreach ($array_database_objects as $database_connection_name):
				$database_connection_object = $$database_connection_name;?>
			<div class="wp_phimind_debugger_main_table_section_header">Sql Queries (Database connection : <?php echo $database_connection_name;?>)</div>
			<?php if (!is_object($database_connection_object)):?>
				<br>
				<span style="font-weight:bold; color:#FF0000; padding-left:20px;">This database connection does not exist (<?php echo $database_connection_name;?>).</span>
				<br>
			<?php else:?>
				<table class="wp_phimind_debugger_data_table">
					<tr>
						<td style="width:30px">#</td>
						<td>Query</td>
						<td>Time</td>
					</tr>
					<?php 
					$counter = 0;
					$query_total = 0;
					foreach ($database_connection_object->queries as $query):
						$query_total += $query[1];
					?>
					<tr>
						<td style="width:30px"><?php echo ++$counter;?></td>
						<td><?php echo $query[0];?></td>
						<td><?php echo $query[1];?></td>
					</tr>
					<?php endforeach;?>			
					<tr>
						<td style="width:30px"></td>
						<td style="text-align:right">Query Total  (<?php echo $counter;?> queries) :</td>
						<td><?php echo $query_total;?></td>
					</tr>
				</table>
			<?php endif;?>

			<br>
			<?php endforeach;?>
		<?php endif;?>


		<?php if (get_option('wp_phimind_debugger_rewrite_rules')):?>
			<div class="wp_phimind_debugger_main_table_section_header">Rewrite Rules (permalink setting must be different from default)</div>
			<table class="wp_phimind_debugger_data_table">
				<?php foreach ($wp_rewrite->rewrite_rules() as $key => $value):?>
				<tr>
					<td><?php echo $key?></td>
					<td><?php echo $value?></td>
				</tr>
				<?php endforeach;?>
			</table>
			<br>
		<?php endif;?>

		<?php 
		$php_vars = array(
							'$_GET'		=> array('wp_phimind_debugger_get_variables', $_GET), 
							'$_POST'	=> array('wp_phimind_debugger_post_variables', $_POST), 
							'$_COOKIE'	=> array('wp_phimind_debugger_cookies_variables', $_COOKIE), 
							'$_REQUEST' => array('wp_phimind_debugger_request_variables', $_REQUEST), 
							'$_SERVER'	=> array('wp_phimind_debugger_server_variables', $_SERVER), 
							'$_ENV'		=> array('wp_phimind_debugger_env_variables', $_ENV), 
							'$_FILES'	=> array('wp_phimind_debugger_files_variables', $_FILES), 
							'$GLOBALS'	=> array('wp_phimind_debugger_globals_variables', $GLOBALS)
							);
		foreach ($php_vars as $php_var_name => $php_var_value):

			$php_var_option_name = $php_var_value[0];
			$php_var_repository = $php_var_value[1];

			//CHECKS THE OPTION TO SHOW THIS VAR
			if (get_option($php_var_option_name) != 1)
				continue;
			?>
			<div class="wp_phimind_debugger_main_table_section_header"><?php echo $php_var_name;?></div>
			<table class="wp_phimind_debugger_data_table">
				<?php foreach ($php_var_repository as $key => $value):
				?>
				<tr>
					<td><?php echo $key;?></td>
					<?php if (is_object($value)):?>
					<td>object</td>
					<?php elseif (is_array($value)):?>
					<td>
						<table>
						<?php foreach($value as $micro_key => $micro_value):?>
							<tr>
								<td><?php echo $micro_key;?></td>
								<td>
									<?php if (is_object($micro_value)):?>
									object
									<?php else:?>
									<?php echo $micro_value;?>
									<?php endif;?>
								</td>
							</tr>
						<?php endforeach;?>
						</table>
					</td>
					<?php else:?>
					<td><?php echo $value;?></td>
					<?php endif;?>
				</tr>
				<?php endforeach;?>
			</table>
			<br>
		<?php endforeach;?>

	</div>
	<br>
	<br>

