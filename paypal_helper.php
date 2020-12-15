<?php
	require "core/functions.php";
	$data = array();
	
	$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
	$price = isset($_POST['extra']) ? (int)$_POST['extra'] : '';
	if($id == ''){
		$data['error'] = 'Package missed!';
	}
	else{
		$check_id =  $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `id` = ".$id ."");
		if(!$check_id->num_rows){
			$data['error'] = 'Product not exists!';
		}
		else{
			$row = $check_id->fetch_assoc();
			if($price < 1){
				$data['error'] = 'Something wrong!';
			}
			else{
				$hash_item = md5($row['price'].$paypal_currency.uniqid(microtime(),1));
				$mysqli->query("INSERT INTO  ".PREFIX."_paypal_orders (`amount`, `currency`, `product_id`, `user_id`, `hash`) VALUES (".$price.", '".$paypal_currency."', ".$id.", ".$_SESSION['UserId'].", '".$hash_item."')");
				$data = array( 'email' => $paypal_email,
							   'item_number' => $hash_item,
							   'currency_code' => $paypal_currency,
							   'amount' => $price,
							   'user' => $_SESSION['UserId']
							 );
			}
		}
	}
	echo json_encode($data);