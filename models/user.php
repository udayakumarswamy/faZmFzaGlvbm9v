<?php
/**
* 
*/
class user_model {

	var $db;

	function __construct() {
		$this->db = getDB();
	}
	function __destruct() {
		$this->db = null;
	}


	function getDetails($userid = 0) {
		$sql = "SELECT rocuserid as uid, rocuserfirstname as fname, rocuserlastname as lname, rocuseremail as email, rocusercity as city, rocuserstate as state, rocusermobile as mobile, rocuseraddress1 as address1, rocuseraddress2 as address2, rocuserpincode as pincode FROM rocusers WHERE  rocuserid = :rocuserid";
		try {
			
			$stmt = $this->db->prepare($sql); 
			$stmt->bindParam("rocuserid", $userid);
			$stmt->execute();		
			$user_data = $stmt->fetchAll(PDO::FETCH_OBJ);
			return json_encode($user_data);
			
		} catch(PDOException $e) {
		    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
			return '{"error":{"message":"'. $e->getMessage() .'"}}'; 
		}
	}
}
?>