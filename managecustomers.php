<?php
	require_once("crud.php");
	
	class CustomerCrud extends Crud {
		
	}

	$crud = new CustomerCrud();
	$crud->subapplications = array(
			array(
				'title'		  => 'Equipment',
				'imageurl'	  => 'images/heart.png',
				'application' => 'managecustomerequipment.php'
			)
		);
	$crud->dialogwidth = 550;
	$crud->title = "Customers";
	$crud->table = "{$_SESSION['DB_PREFIX']}members";
	
	$crud->sql = 
			"SELECT A.*
			 FROM {$_SESSION['DB_PREFIX']}members A 
			 WHERE member_id NOT IN (SELECT memberid FROM {$_SESSION['DB_PREFIX']}userroles B WHERE B.roleid = 'ADMIN')
			 ORDER BY A.firstname, A.lastname"; 
			
	$crud->columns = array(
			array(
				'name'       => 'member_id',
				'length' 	 => 6,
				'showInView' => false,
				'bind' 	 	 => false,
				'filter'	 => false,
				'editable' 	 => false,
				'pk'		 => true,
				'label' 	 => 'ID'
			),
			array(
				'name'       => 'login',
				'length' 	 => 30,
				'label' 	 => 'Login ID'
			),
			array(
				'name'       => 'fullname',
				'length' 	 => 60,
				'label' 	 => 'Name'
			),
			array(
				'name'       => 'landline',
				'length' 	 => 13,
				'label' 	 => 'Contact Number'
			),
			array(
				'name'       => 'passwd',
				'type'		 => 'PASSWORD',
				'length' 	 => 30,
				'showInView' => false,
				'label' 	 => 'Password'
			),
			array(
				'name'       => 'cpassword',
				'type'		 => 'PASSWORD',
				'length' 	 => 30,
				'bind'		 => false,
				'showInView' => false,
				'label' 	 => 'Confirm Password'
			)
		);
		
	$crud->run();
?>
