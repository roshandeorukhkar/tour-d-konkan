<?php
/**************************************************/
## Class Name - Model_Users
/**************************************************/

class Model_Users extends Database 
{	
	## Constructor
	function Model_Users() {
		$this->user = USERS;
		$this->Database();
	}	
	
	## Check user login
	function getUserValueByDetailsUsernameAndPassword($username, $password) {
		$fields=array();	
		$tables=array($this->user);
		$where=array("(username='".$username."'  AND  password='".md5($password)."')");		
		$result1 = $this->SelectData($fields,$tables, $where, $order = array(), $group=array(),$limit = "",0,0); 
		$result= $this->FetchRow($result1); 
		return $result;		
	}
	## Get user details by userid
	function getUserDetailsByUserId($id) {
		$fields=array();	
		$tables=array($this->user);
		$where=array("id=".$id);		
		$result1 = $this->SelectData($fields,$tables, $where, $order = array(), $group=array(),$limit = "",0,0); 
		$result= $this->FetchRow($result1); 
		return $result;		
	}
	
	## Get user details by userid
	function getAllUsers($search, $limit='',$offset='') {
		$fields=array();	
		$tables=array($this->user);
		$where = array(" user_type != '1' AND user_type != '2' ");
		if($search != '') {
			//$where[] = "concat(first_name,' ',last_name) like '%".$search."%'";
			$where[] = "(concat(first_name,' ',last_name) LIKE '%".$search."%' OR email LIKE '%".$search."%' )";
		}
			
		$result1 = $this->SelectData($fields,$tables, $where, $order = array(), $group=array(), $limit,$offset,0);
		$result= $this->FetchAll($result1); 
		return $result;		
	}
	
	## check email address is present
	function checkUserEmailPresent($email) {
		$fields=array("id, email");	
		$tables=array($this->user);
		$where=array("email ='".$email."'");		
		$result1 = $this->SelectData($fields,$tables, $where, $order = array(), $group=array(),$limit = "",0,0); 
		$result= $this->FetchRow($result1); 
		return $result;		
	}
	## Add user in database
	function addUserByValue($Array) {
		$this->InsertData( $this->user , $Array );		
		$insertId = mysql_insert_id();
		return $insertId;
	}	
	## Edit user by userid
	function editUserValueById($array, $Id){
		$this->UpdateData($this->user,$array,"id",$Id,0);
	}
	## Delete user by userid
	function deleteUserValueById($id){
		$this->DeleteData($this->user,"id",$id);
	}
	## fetch last 5 registered user
	function getLasrFiveRegistedUser() {
		$fields=array();	
		$tables=array($this->user);
		$where=array("user_type!='1'");		
		$result1 = $this->SelectData($fields,$tables, $where, $order = array("registered_date DESC"), $group=array(),$limit = "5",0,0); 
		$result= $this->FetchAll($result1); 
		return $result;	
	}
	
	## Update user status with multiple ids
	function updateUserStatus($ids, $status) {
		$sql = "UPDATE ".$this->user." SET user_status='".$status."' WHERE id IN (".$ids.")";
		$result1= $this->ExecuteQuery($sql);	 
	}
	
	## Delete faq category with multiple ids
	function deleteUsers($ids) {
		$sql = "DELETE FROM ".$this->user." WHERE id IN (".$ids.")";
		$result1= $this->ExecuteQuery($sql);	 
	}
	
	## Get user First name And last Name by userid
	function getUserNameByUserId($id) {
		$fields=array('first_name','last_name');	
		$tables=array($this->user);
		$where=array("id=".$id);		
		$result1 = $this->SelectData($fields,$tables, $where, $order = array(), $group=array(),$limit = "",0,0); 
		$result= $this->FetchRow($result1); 
		return $result['first_name'].' '.$result['last_name'];		
	}
	
}
?>
