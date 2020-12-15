<?php
class User {
		var $fullname;
		var $firstname;
		var $lastname;
		var $username;
		var $level;
		var $email;
		var $address;
		var $phone;
		var $business_name;
		var $business_id;
		var $gender;
		var $id;
		var $image;
		
		var $admin = 1;
		function __construct($id) {
			if($id != 0)
			{
				$data = $GLOBALS['mysqli']->query("SELECT * FROM `".PREFIX."_members` WHERE `id`='".(int) $id."'")->fetch_assoc();
				$this->fullname		= $data['firstname']." ".$data['lastname'];
				$this->firstname	= $data['firstname'];
				$this->lastname		= $data['lastname'];
				$this->username		= $data['username'];
				$this->id			= $data['id'];
				$this->level		= $data['level'];
				$this->email		= $data['email'];
				$this->address		= $data['address'];
				$this->phone		= $data['phone'];
				$this->business_name= $data['business_name'];
				$this->business_id	= $data['business_id'];
				$this->gender		= $data['gender'];
				$this->image		= $data['picture'];
			}
			else {
				$this->level = 0;
			}

		}

		function get_Fullname() {
			return $this->fullname;
		}
		function get_FirstName() {
			return $this->firstname;
		}
		function get_LastName() {
			return $this->lastname;
		}
		
		function get_Id() {
			return $this->id;
		}
		
		function check_admin() {
			if($this->level == $this->admin)
				return true;
			return false;
		
		}
		
		function get_Email() {
			return $this->email;	
		}
		
		function get_Address(){
			return $this->address;
		}
		
		function get_Phone(){
			return $this->phone;
		}
		
		function get_BusinessName(){
			return $this->business_name;
		}
		
		function get_BusinessId(){
			return $this->business_id;
		}
		
		function get_Gender(){
			return $this->gender;
		}
		function get_Image(){
			return $this->image;
		}
}

?>