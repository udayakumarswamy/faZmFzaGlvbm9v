<?php
/**
* 
*/
class User {
	var $user_model;
	function __construct() {
		$this->user_model = new user_model();
	}

	function getDetails($app, $userid = 0) {
		echo $this->user_model->getDetails($userid);
		$app->response->setStatus(200);
	}
}
?>
