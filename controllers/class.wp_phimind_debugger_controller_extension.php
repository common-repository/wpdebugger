<?php 

	class wp_phimind_debugger_controller_extension
	{
		var $params;

		function __construct()
		{
			$this->parseParams();
		}

		function parseParams() 
		{
			//PARSE FORM VALUES
			if (isset($_POST)) {
				$params['form'] = $_POST;
				if (ini_get('magic_quotes_gpc') === '1') {
					$params['form'] = stripslashes_deep($params['form']);
				}
				if (isset($params['form']['_method'])) {
					if (!empty($_SERVER)) {
						$_SERVER['REQUEST_METHOD'] = $params['form']['_method'];
					} else {
						$_ENV['REQUEST_METHOD'] = $params['form']['_method'];
					}
					unset($params['form']['_method']);
				}
			}
			if (!empty($params['form']['data']))
				$this->params["data"] = $params['form']['data'];

			//PARSE QUERYSTRING VALUES
			$this->params["named"] = array();
			$qs = $_SERVER["QUERY_STRING"];
			$array_qs = explode("&", $qs);
			foreach ($array_qs as $pair)
			{
				$array_pair = explode("=", $pair);
				if (empty($array_pair[1]))
					$val = '';
				else
					$val = $array_pair[1];
				$this->params["named"][$array_pair[0]] = $val;
			}
		}

	}

?>