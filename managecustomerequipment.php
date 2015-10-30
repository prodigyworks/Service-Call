<?php
	require_once("crud.php");
	
	class CustomerCrud extends Crud {
		
	}
	
	$id = $_GET['id'];

	$crud = new CustomerCrud();
	$crud->dialogwidth = 550;
	$crud->title = "Equipment";
	$crud->table = "{$_SESSION['DB_PREFIX']}customerequipment";
	
	$crud->sql = 
			"SELECT A.*, B.fullname
			 FROM {$_SESSION['DB_PREFIX']}customerequipment A 
			 INNER JOIN {$_SESSION['DB_PREFIX']}members B
			 ON B.member_id = A.memberid 
			 WHERE memberid = $id
			 ORDER BY A.name"; 
			
	$crud->columns = array(
			array(
				'name'       => 'id',
				'length' 	 => 6,
				'showInView' => false,
				'bind' 	 	 => false,
				'filter'	 => false,
				'editable' 	 => false,
				'pk'		 => true,
				'label' 	 => 'ID'
			),
			array(
				'name'       => 'memberid',
				'length' 	 => 6,
				'default'	 => $id,
				'showInView' => false,
				'filter'	 => false,
				'editable' 	 => false,
				'label' 	 => 'Customer'
			),
			array(
				'name'       => 'fullname',
				'length' 	 => 60,
				'filter'	 => false,
				'bind'	 	 => false,
				'editable' 	 => false,
				'label' 	 => 'Customer'
			),
			array(
				'name'       => 'name',
				'length' 	 => 60,
				'label' 	 => 'Name'
			),
			array(
				'name'       => 'landline',
				'length' 	 => 13,
				'label' 	 => 'Contact Number'
			)
		);
		
	$crud->run();
?>
