<?php

	$hapikey = "e50a973c-50a1-449f-88b6-d49ef240e784";

     $date1 = strtotime(date("Y-m-d h:i:s"));
	 
	 //get 6 hours last transaction since current time
	 $date2 = strtotime(date("Y-m-d h:i:s")) - 21600;
	 
	 $fulldate = date("Y-m-d h:i:s",$date1);
	 $fulldate2 = date("Y-m-d h:i:s",$date2);
	 
	
	$arr2 = array();
	$userqueries = "SELECT * FROM `users` as a WHERE updated_at BETWEEN '$fulldate2' AND '$fulldate' OR id IN (SELECT user_id FROM `class_registrations` WHERE updated_at BETWEEN '$fulldate2' AND '$fulldate' AND user_id=a.id) OR id IN (SELECT user_id FROM `subscriptions` WHERE updated_at BETWEEN '$fulldate2' AND '$fulldate1' AND user_id=a.id)";

	$datas = mysql_query_md($userqueries);

	$result = array();
	
	
	while($row=mysql_fetch_md_assoc($datas)){
		

		
		
		$id = $row['id'];
		$email = $row['email'];
		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$phone = $row['phone'];
		$custom___create_date = $custom___became_a_lead_date = strtotime(date("m/d/Y",strtotime($row['created_at']))." 08:00:00 AM +08") * 1000;
		
		$arr2 = array();
		
		

		
		
		
		$categories_of_interest_query = (mysql_query_md("SELECT name FROM `categories` 
		WHERE id IN (SELECT DISTINCT category_id FROM `series` WHERE id 
		IN (SELECT id FROM groops WHERE id 
		IN (SELECT groop_class_id FROM class_registrations WHERE user_id = $id))) GROUP by name"));
		
		$categories_of_interest_array = array();
		while($catinterest=mysql_fetch_md_assoc($categories_of_interest_query)){
			$categories_of_interest_array[] = $catinterest['name'];
		}
		
		$categories_of_interest = implode(";",$categories_of_interest_array);
		
		
		
		
		
		
		
		
		
		
		$number_groups = mysql_fetch_md_assoc(mysql_query_md("SELECT COUNT(*) as total FROM `users`"));
		$number_of_groops_attended = $number_groups['total'];
		

		$groops_attended_query = (mysql_query_md("SELECT name FROM groops WHERE id IN
		 (SELECT groop_class_id FROM class_registrations WHERE user_id = $id) GROUP by name"));
		$groops_attended_array = array();
		while($catinterest=mysql_fetch_md_assoc($groops_attended_query)){
			$groops_attended_array[] = trim($catinterest['name']);
		}		
		
		$groops_attended = implode(";",$groops_attended_array);
		
		
		
		
		$firstconv = mysql_fetch_md_assoc(mysql_query_md("SELECT a.groop_class_id,a.created_at,a.updated_at,b.groop_id,c.name FROM `class_registrations` as a 
		LEFT JOIN groop_classes as b ON a.groop_class_id = b.id 
		LEFT JOIN groops as c ON b.groop_id=c.id WHERE a.user_id = $id ORDER BY `a`.`created_at` ASC LIMIT 1"));
	
		$lastconv = mysql_fetch_md_assoc(mysql_query_md("SELECT a.groop_class_id,a.created_at,a.updated_at,b.groop_id,c.name FROM `class_registrations` as a 
		LEFT JOIN groop_classes as b ON a.groop_class_id = b.id 
		LEFT JOIN groops as c ON b.groop_id=c.id WHERE a.user_id = $id ORDER BY `a`.`created_at` DESC LIMIT 1"));
	
	

	
		if(!empty($firstconv['name'])) {
			$custom___first_conversion = $firstconv['name'];
			$custom___first_conversion_date = strtotime(date("m/d/Y",strtotime($firstconv['created_at']))." 08:00:00 AM +08") * 1000;
		}
		
		if(!empty($lastconv['name'])) {
			$custom_recent_conversion = $lastconv['name'];
			$custom___recent_conversion_date = strtotime(date("m/d/Y",strtotime($lastconv['created_at']))." 08:00:00 AM +08") * 1000;	
		}		
		
		$customerdate = mysql_fetch_md_assoc(mysql_query_md("SELECT * FROM `subscriptions` WHERE user_id = $id ORDER BY `subscriptions`.`created_at` ASC LIMIT 1"));	
		if($customerdate['created_at']){
		$custom____became_a_customer_date = strtotime(date("m/d/Y",strtotime($customerdate['created_at']))." 08:00:00 AM +08") * 1000;	
		}
		

		
		
		//$arr2['properties'][]  = array('property' => 'n14_day_trial_ends','value' => $n14_day_trial_ends);
		//$arr2['properties'][]  = array('property' => 'n30_day_trial_ends','value' => $n30_day_trial_ends);
		
		

		
		

		
		$arr2['properties'][]  = array('property' => 'email','value' => $email);
		$arr2['properties'][]  = array('property' => 'firstname','value' => $firstname);
		$arr2['properties'][]  = array('property' => 'lastname','value' => $lastname);
		$arr2['properties'][]  = array('property' => 'phone','value' => $phone);		
		$arr2['properties'][]  = array('property' => 'categories_of_interest','value' => $categories_of_interest);
		$arr2['properties'][]  = array('property' => 'number_of_groops_attended','value' => $number_of_groops_attended);
		$arr2['properties'][]  = array('property' => 'groops_attended','value' => $groops_attended);				
		$arr2['properties'][]  = array('property' => 'custom___first_conversion','value' => $custom___first_conversion);
		$arr2['properties'][]  = array('property' => 'custom___first_conversion_date','value' => $custom___first_conversion_date);	
		$arr2['properties'][]  = array('property' => 'custom_recent_conversion','value' => $custom_recent_conversion);
		$arr2['properties'][]  = array('property' => 'custom___recent_conversion_date','value' => $custom___recent_conversion_date);
		$arr2['properties'][]  = array('property' => 'custom___create_date','value' => $custom___create_date);
		$arr2['properties'][]  = array('property' => 'custom___became_a_lead_date','value' => $custom___became_a_lead_date);
		$arr2['properties'][]  = array('property' => 'custom____became_a_customer_date','value' => $custom____became_a_customer_date);	
		$arr2['properties'][]  = array('property' => 'lifecyclestage','value' => $lifecyclestage);

		
		
		
		
        $post_json = json_encode($arr2);
        
        $endpoint = "https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/$email/?hapikey=$hapikey";
		
		$x = postCurl($endpoint,$post_json);
		echo "<pre>";
		var_dump($arr2);
		echo "@@@";
		var_dump($x);
		echo "<hr>";

}			
		
		
		
function postCurl($endpoint,$post_json){

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
		
		return $response;
		
	
}


function updateCurl($endpoint,$post_json){

        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		@curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");		
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
		
		return $response;
		
	
}






		
function getCurl($endpoint){

        $ch = @curl_init();
        //@curl_setopt($ch, CURLOPT_POST, true);
        //@curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
		
		return $response;

}	


function getconnection(){
	
  return new mysqli("localhost","root","root","groops",3307);
  
  
}

function mysql_query_md($q){


		$mysqli = getconnection();

		// Check connection
		if ($mysqli -> connect_errno) {
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}

		// Perform query
		if ($result = $mysqli -> query($q)) {
		  // Free result set
		  
		}

		$mysqli -> close();

		return $result;
}

function mysql_fetch_md_assoc($result){
	return mysqli_fetch_assoc($result);
}

function updateGroops(){
	
	
	$datas = (mysql_query_md("SELECT * FROM `groops`"));
	
	
	$result = array();
	
	while($row=mysql_fetch_md_assoc($datas)){
		
		$result[] = $row;
		
	}

	$endpoint2 = "https://api.hubapi.com/properties/v1/contacts/properties/named/groops_attended?hapikey=e50a973c-50a1-449f-88b6-d49ef240e784";

	$x = getCurl($endpoint2);
	$js = json_decode($x,true);

	
	
	$titles = array();
	
	foreach($js['options'] as $t){
		
		$titles[] = $t['label'];
	}
	

	
	foreach($result as $d){
	$d['name'] = trim($d['name']);
	if (!in_array($d['name'], $titles)) {
	$add = array();
	$add['description'] = "";
	$add['label'] = $d['name'];
	$add['value'] = $d['name'];
	$add['displayOrder'] = -1;
	$js['options'][] = $add;
	$titles[] = $d['name'];
	
	}
	
		
	}
	

	$post = json_encode($js);	
	updateCurl($endpoint2,$post);
	
	

	
}



		//updateGroops();


		//$x = postCurl($endpoint,$post_json);
		


		
		
		
		
		
		
		
		
		
		
?>