<?php
	error_reporting(0);
	require "core/functions.php";
	echo $paypal_email;
	$req = 'cmd=_notify-validate'; // Initialize the $req variable and add CMD key value pair

	// Read the post from PayPal
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
	}

	// Now Post all of that back to PayPal's server using curl, and validate everything with PayPal
	$url = "https://www.paypal.com/cgi-bin/webscr";
	$curl_result = $curl_err = '';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$curl_result = @curl_exec($ch);
	$curl_err = curl_error($ch);
	curl_close($ch);
	if (strpos($curl_result, "VERIFIED") !== false) {
		$bussines =  addslashes($_POST['bussines']);
		$receiver_email = addslashes($_POST['receiver_email']);
		$txn_type = addslashes($_POST['txn_type']);
		$mc_gross = addslashes($_POST['mc_gross']);
		$tax = doubleval(addslashes($_POST['tax']));
		$payment_status = addslashes($_POST['payment_status']);
		$item_number = addslashes($_POST['item_number']);
		$transaction_id = addslashes($_POST['txn_id']);
		$currency = addslashes($_POST['mc_currency']);
		$payer_email = addslashes($_POST['payer_email']);
		writelog(serialize($_POST), 'Paypal_POSTS');
		
		if(strtolower($receiver_email) == strtolower($paypal_email)){
			writelog('My E-Mail OK [transaction id: '.$transaction_id.']', 'Paypal');
			$check_order = $mysqli->query("SELECT * FROM ".PREFIX."_paypal_orders WHERE `hash` = '".$item_number."'");
			if($check_order->num_rows){
				writelog('Transaction found [transaction id: '.$transaction_id.']', 'Paypal');
				$order_info = $check_order->fetch_assoc();
				switch($txn_type){
					case 'web_accept':
					case 'subscr_payment':
						switch($payment_status){
							case "Completed":
							case "Pending":
								if($tax > 0){
									$mc_gross -= $tax;
								}
								writelog('Transaction payment status OK [transaction id: '.$transaction_id.']', 'Paypal');
								if($mc_gross == $order_info['amount']){
									writelog('Transaction Money OK [transaction id: '.$transaction_id.']', 'Paypal');
									if($currency == $order_info['currency']){
										writelog('Transaction currency OK [transaction id: '.$transaction_id.']', 'Paypal');
										$check_transaction = $mysqli->query("SELECT `id` FROM ".PREFIX."_orders` WHERE `transaction_id` = '".$transaction_id."'");
										if(!$check_pending->num_rows){
											writelog('Transaction queries OK [transaction id: '.$transaction_id.']', 'Paypal');
										//	$mysqli->query("INSERT INTO `".PREFIX."_paypal_transactions` (`transaction_id`, `amount`, `currency`, `user_id`, `order_time`, `status`, `payer_email`) VALUES ('".$transaction_id."', '".$mc_gross."', '".$currency."', ".$order_info['user_id'].", ".time().", '".$payment_status."', '".$payer_email."')");
											$mysqli->query("INSERT INTO `".PREFIX."_orders` (`date`, `userid`, `productid`, `status`, `ip`, `broker_id`, `Cost`, `transaction_id`, `payer_email`) VALUES (".time().", ".$order_info['user_id'].", ".$order_info['product_id'].", 0, '".$_SERVER['REMOTE_ADDR']."', 0, ".$order_info['amount'].", '".$transaction_id."', '".$payer_email."')");
											$mysqli->query("UPDATE `".PREFIX."_members` SET `level` = 2 where `id` = ".$order_info['user_id']."");
											////send mail///	
											$time = date('Y-m-d');
											$time = date('Y-m-d');
											$msg = "Email: ".$payer_email." Cost: ".$order_info['amount']."₪"." Purchased on: ".$time;
											$msg = wordwrap($msg,70);
											$title = "התבצעה קנייה חדשה בתאריך - ".$time;
											mail("adarelk2@gmail.com",$title,$msg);
											mail("skywork17@gmail.com",$title,$msg);
											mail($payer_email,$title,$msg);
											//end mail///
										}
										
									}
								}
							break;
						}
					break;
				}
			}
			else{
				writelog('PayPal sent invalid order [transaction id: '.$transaction_id.']', 'Paypal');
			}
		}
		else{
			writelog('PayPal sent invalid reciever email: '.strtolower($receiver_email).'', 'Paypal');
		}
		
	}
	else{
		writelog('2', 'Paypal');
	}

	/*
	require "core/functions.php";
	$req = 'cmd=_notify-validate';
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
	}
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	$fp = @fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
	$bussines =  addslashes($_POST['bussines']);
	$receiver_email = addslashes($_POST['receiver_email']);
	$txn_type = addslashes($_POST['txn_type']);
	$mc_gross = addslashes($_POST['mc_gross']);
	$tax = doubleval(addslashes($_POST['tax']));
	$payment_status = addslashes($_POST['payment_status']);
	$item_number = addslashes($_POST['item_number']);
	$transaction_id = addslashes($_POST['txn_id']);
	$currency = addslashes($_POST['mc_currency']);
	$payer_email = addslashes($_POST['payer_email']);
	if(!$fp){
		writelog('PayPal sent fsockopen error no. '.$errno.': '.$errstr.'','Paypal');
	}
	else{
		@file_put_contents("tes1t.txt", $fp);
		fputs($fp, $header.$req);
		#@file_put_contents("test.txt", $fp);
		while(!feof($fp)){
			$res = fgets ($fp, 1024);
			if(strcmp($res, 'VERIFIED') == 0){
				if(strtolower($receiver_email) == strtolower($paypal_email)){
					$check_order = $mysqli->query("SELECT * FROM ".PREFIX."_paypal_orders WHERE `hash` = '".$item_number."'");
					if($check_order->num_rows){
						$order_info = $check_order->fetch_assoc();
						if($txn_type == 'web_accept' || $txn_type == 'subscr_payment'){
							switch($payment_status){
								case 'Completed':
								case 'Pending':
									if($tax > 0){
										$mc_gross -= $tax;
									}
									if($mc_gross == $order_info['amount']){
										if($currency == $order_info['currency']){
											$check_transaction = $mysqli->query("SELECT `id` FROM ".PREFIX."_paypal_transactions WHERE `transaction_id` = '".$transaction_id."' AND `status` = 'Completed'");
											if(!$check_transaction->num_rows){
												$check_pending = $mysqli->query("SELECT `id` FROM ".PREFIX."_paypal_transactions WHERE `transaction_id` = '".$transaction_id."' AND `status` = 'Pending'");
												if(!$check_pending->num_rows){
													writelog('3', 'Paypal');
													$mysqli->query("INSERT INTO `turing_orders` (`date`, `userid`, `productid`, `status`, `ip`, `broker_id`, `Cost`, `transaction_id`, `payer_email`) VALUES (".time().", ".$order_info['user_id'].", ".$order_info['product_id'].", 0, '".$_SERVER['REMOTE_ADDR']."', 0, ".$order_info['amount'].", '".$transaction_id."', '".$payer_email."')");
													$mysqli->query("UPDATE `turing_members` SET `level` = 2 where `id` = ".$order_info['user_id']."");
												}
												else{
													writelog('2', 'Paypal');
													$mysqli->query("INSERT INTO `turing_orders` (`date`, `userid`, `productid`, `status`, `ip`, `broker_id`, `Cost`, `transaction_id`, `payer_email`) VALUES (".time().", ".$order_info['user_id'].", ".$order_info['product_id'].", 0, '".$_SERVER['REMOTE_ADDR']."', 0, ".$order_info['amount'].", '".$transaction_id."', '".$payer_email."')");
													$mysqli->query("UPDATE `turing_members` SET `level` = 2 where `id` = ".$order_info['user_id']."");
												}
											}
										}
									}
									break;
								case 'Reversed': 
								case 'Refunded':
									writelog('??', 'Paypal');
									#ignore
									break;
							}
						}
					}
					else{
						writelog('PayPal sent invalid order [transaction id: '.$transaction_id.']', 'Paypal');
					}
				}
				else{
					writelog('PayPal sent invalid reciever email: '.strtolower($receiver_email).'', 'Paypal');
				}
			}
			elseif(strcmp ($res, "INVALID") == 0){
				writelog('PayPal sent [status: INVALID] [transaction id: '.$transaction_id.']', 'Paypal');
			}
			else{
				writelog('PayPal sent [status: UNKNOWN] [transaction id: '.$transaction_id.']','Paypal');
			}
		}
		fclose($fp);
	}
	*/
	function writelog($logentry, $lgname){
		$log = '['.$_SERVER['REMOTE_ADDR'].'] '.$logentry.'';
		if(!is_dir("logs")){
			mkdir("logs");
		}
		$log_name = 'logs/'.$lgname.'_'.date("m-d-y").'.txt';
		$logfile = @fopen ($log_name, "a+");
		if ($logfile){
			fwrite ($logfile, "[".date ("h:iA")."] $log\r\n");
			fclose ($logfile);
		}
	}