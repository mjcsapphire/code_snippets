<?php
include_once('../header.php');
if(!isset($_SESSION))
{ 
	session_set_cookie_params(time() + 43200000, '/', 'www.directly-sourced.com', isset($_SERVER["HTTPS"]), true);
	ini_set('session.gc_maxlifetime', 43200000);
	session_start(); 
} 
if(!empty($_POST["action"])) {
	if($_POST["action"] == 'approve_property'){
		$property_id = $_POST["id"];
		$property = get_property($property_id);
		$recipient = get_user_from_id($property[0]['publisher']);
		$notification = 'Your property titled: '.$property[0]['title'] .' (#'.$property[0]['id'].') has been approved';
		create_notification(0, $recipient[0]['id'], $_POST["id"], 1, $notification);
		approve_property($property_id);
		$output = array(  
			'success'     =>     'success'
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'reject_property'){
		$property_id = $_POST["id"];
		$property = get_property($property_id);
		$recipient = get_user_from_id($property[0]['publisher']);
		$notification = 'Your property titled: '.$property[0]['title'] .' (#'.$property[0]['id'].') has been rejected for the following reasons: '.$_POST['rejection_reason'];
		create_notification(0, $recipient[0]['id'], $_POST["id"], 1, $notification);
		reject_property($property_id);
		$output = array(  
			'success'     =>     'success'
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'property_message'){
		$property_id = $_POST["id"];
		$user =  get_user_from_kv($_SESSION['userID']);
		$property = get_property($property_id);
		$recipient = get_user_from_id($property[0]['publisher']);
		if($user[0]['user_type'] == 1){
			$notification = 'Investor ' . $user[0]['firstname'] . ' ' .$user[0]['surname'] .' has messaged you whilst viewing your property titled: '.$property[0]['title'] .' (#'.$property[0]['id'].')';
		}if($user[0]['user_type'] == 3){
			$notification = 'Dual account holder ' . $user[0]['firstname'] . ' ' .$user[0]['surname'] .' has messaged you whilst viewing your property titled: '.$property[0]['title'] .' (#'.$property[0]['id'].')';
		}else{
			$notification = 'Sourcer ' . $user[0]['firstname'] . ' ' .$user[0]['surname'] .' has messaged you whilst viewing your property titled: '.$property[0]['title'] .' (#'.$property[0]['id'].')';
		}
		create_notification($user[0]['id'], $recipient[0]['id'], $_POST["id"], 2, $notification);
		$message = $_POST['message'];
		add_message_with_property($user[0]['id'], $recipient[0]['id'], $message, $_POST["id"]);
		$output = array(  
			'success'     =>     'success'
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'bookmark_property'){
		$id = $_POST["id"];
		$user =  get_user_from_kv($_SESSION['userID']);
		add_bookmark($user[0]['id'], $id);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'unbookmark_property'){
		$id = $_POST["id"];
		$user =  get_user_from_kv($_SESSION['userID']);
		remove_bookmark($user[0]['id'], $id);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'hide_property'){
		$id = $_POST["id"];
		hide_property($id);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'unhide_property'){
		$id = $_POST["id"];
		unhide_property($id);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'sell_property'){
		$id = $_POST["id"];
		sell_property($id);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'unsell_property'){
		$id = $_POST["id"];
		unsell_property($id);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'save_new_property'){
		$title = $_POST["title"];
		$property_type = $_POST["property_type"];
		$investment_type = $_POST["investment_type"];
		$property_details = $_POST["property_details"];
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$address3 = $_POST["address3"];
		$city = $_POST["city"];
		$county = $_POST["county"];
		$postcode = $_POST["postcode"];
		$location_info = $_POST["location_info"];
		$price = $_POST["price"];
		$rental_yield = $_POST["rental_yield"];
		$roi = $_POST["roi"];
		$roce = $_POST["roce"];
		$bmv_percentage = $_POST["bmv_percentage"];
		$sourcing_fee = $_POST["sourcing_fee"];
		$financial_info = $_POST["financial_info"];
		$joint_venture = $_POST["joint_venture"];
		$rent_per_month = $_POST["rent_per_month"];
		$rent_per_month = $_POST["rent_to_landlord"];
		$rent_to_landlord = $_POST["rent_to_landlord"];
		
		//Remove letters and signs from financial figures
		$price = preg_replace("/[^0-9.]/", "", $price);
		$rental_yield = preg_replace("/[^0-9.]/", "", $rental_yield);
		$roi = preg_replace("/[^0-9.]/", "", $roi);
		$roce = preg_replace("/[^0-9.]/", "", $roce);
		$bmv_percentage = preg_replace("/[^0-9.]/", "", $bmv_percentage);
		$sourcing_fee = preg_replace("/[^0-9.]/", "", $sourcing_fee);
		$rent_per_month = preg_replace("/[^0-9.]/", "", $rent_per_month);
		$rent_to_landlord = preg_replace("/[^0-9.]/", "", $rent_to_landlord);

		//Add to DB
		$user =  get_user_from_kv($_SESSION['userID']);
		$id = add_property($user[0]['id'], $title, $property_type, $investment_type, $property_details, $address1, $address2, $address3, $city, $county, $postcode, $location_info, $price, $rental_yield, $roi, $roce, $bmv_percentage, $sourcing_fee, $financial_info, $joint_venture, $rent_per_month, $rent_to_landlord);
		$output = array(  
			'id'     =>     $id
		);  
		echo json_encode($output); 
	}
	if($_POST["action"] == 'submit_property'){
		$id = $_POST["id"];

		//Check at least 2 images
		$images_ok = check_property_images($id);
		if($images_ok){
			$title = $_POST["title"];
			$property_type = $_POST["property_type"];
			$investment_type = $_POST["investment_type"];
			$property_details = $_POST["property_details"];
			$address1 = $_POST["address1"];
			$address2 = $_POST["address2"];
			$address3 = $_POST["address3"];
			$city = $_POST["city"];
			$county = $_POST["county"];
			$postcode = $_POST["postcode"];
			$location_info = $_POST["location_info"];
			$price = $_POST["price"];
			$rental_yield = $_POST["rental_yield"];
			$roi = $_POST["roi"];
			$roce = $_POST["roce"];
			$bmv_percentage = $_POST["bmv_percentage"];
			$sourcing_fee = $_POST["sourcing_fee"];
			$financial_info = $_POST["financial_info"];
			$video = $_POST["video"];
			$rent_per_month = $_POST["rent_per_month"];
			$rent_to_landlord = $_POST["rent_to_landlord"];

			//Remove letters and signs from financial figures
			$price = preg_replace("/[^0-9.]/", "", $price);
			$rental_yield = preg_replace("/[^0-9.]/", "", $rental_yield);
			$roi = preg_replace("/[^0-9.]/", "", $roi);
			$roce = preg_replace("/[^0-9.]/", "", $roce);
			$bmv_percentage = preg_replace("/[^0-9.]/", "", $bmv_percentage);
			$sourcing_fee = preg_replace("/[^0-9.]/", "", $sourcing_fee);
			$rent_per_month = preg_replace("/[^0-9.]/", "", $rent_per_month);
			$rent_to_landlord = preg_replace("/[^0-9.]/", "", $rent_to_landlord);

			//Format youtube video
			$video = str_replace("https://youtu.be/", "", $video);

			//Add to DB
			$user =  get_user_from_kv($_SESSION['userID']);
			update_property($id, $title, $property_type, $investment_type, $property_details, $address1, $address2, $address3, $city, $county, $postcode, $location_info, $price, $rental_yield, $roi, $roce, $bmv_percentage, $sourcing_fee, $financial_info, $video, $rent_per_month, $rent_to_landlord);

			//Create log entry
			$notification = 'Property submitted for approval';
			$already_exists = check_notification_exists($user[0]['id'], 0, $id, 1, $notification);
			if(!$already_exists){
				create_notification($user[0]['id'], 0, $id, 1, $notification);
			}
			$output = array(  
				'id'     =>     $id
			);  
			echo json_encode($output); 
		}else{
			$output = array(  
				'error'     =>     'Please upload images 1, 2 and 3 before submitting'
			);  
			echo json_encode($output); 
		}
	}
}
?>