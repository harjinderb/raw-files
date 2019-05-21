<?php

//$date = gmdate("Y-m-d\TH:i:s.v\Z");

$ch = curl_init('https://rest.messagebird.com/lookup/9464167869');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                    
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=UTF-8',                                                                           
		    'Authorization: AccessKey qmSnTxJu0oJURyhDDMMzKCzlO')                                                                     
		);
 
$response = curl_exec($ch);
$result = json_decode($response);
if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo '<pre>'; print_r($result->errors);
}

curl_close($ch);

/* 
  	public function sendOtp($request)
    {
    	$mobile = $request->get_param('mobile_no');

    	$date = gmdate("Y-m-d\TH:i:s.v\Z");
		$message = array(
			'identity' 	=> array('type' => 'number','endpoint'=>$mobile),
			'method' 	=> 'sms',
			'metadata' 	=> array('os'=>'rest','platform'=>'N/A')
			);
		$formdata = json_encode($message);

		$ch = curl_init(SINCH_VERIFICATION_URL);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $formdata);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept-Language: nl-NL',
			'Content-Type: application/json; charset=UTF-8',
		    'x-timestamp:'.$date,                                                                                
		    'authorization: application '.SINCH_SECRET_KEY)                                                                     
		);

		 
		$result = curl_exec($ch);
		$status = '';
		$errormeg = '';

		if(curl_errno($ch)) {
			$status = 'error';
			$errormeg = __('Incorrect mobile number. Please check and resubmit.', 'fitzMe');		  
		} else {
		    $result = json_decode($result);
		    	
		    if(isset($result->errorCode)){
		    	if($result->errorCode == 40005){
		    		$status = 'error';
					$errormeg = __('Mobile number is missing the country code. Like +353 (always use + sign with country code).', 'fitzMe');
		    	}else{
		    		$status = 'error';
					$errormeg = __('Incorrect mobile number. Please check and resubmit.', 'fitzMe');
		    	}
		    }else{
		    	$status = 'success';
				$errormeg = __('OTP code sent on your mobile number.', 'fitzMe');
		    }
		     			
		}
		curl_close($ch);

		$data = [
		    'status' => $status,
		    'message'=> $errormeg,
		]; 

		return new WP_REST_Response( $data, 200 );
    }

    public function verifyOtp($request)
    {
    	$mobile = $request->get_param('mobile_no');
    	$otp = $request->get_param('otp_code');

    	$date = gmdate("Y-m-d\TH:i:s.v\Z");
    	$message = array(
						'source'	=> 'manual',
						'method' 	=> 'sms',
						'sms' 	=> array('code'=> $otp)
					);
		
		$formdata = json_encode($message);

		$ch = curl_init(SINCH_VERIFICATION_URL.'number/'.$mobile);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$formdata);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json; charset=UTF-8',
		    'x-timestamp:'.$date,                                                                                
		    'authorization: application '.SINCH_SECRET_KEY)                                                                     
		);	

		$result = curl_exec($ch);
		$status = '';
		$errormeg = '';

		if(curl_errno($ch)) {
			$status = 'error';
			$errormeg = __('OTP verification failed. Please try again!', 'fitzMe');		  
		} else {
		    $result = json_decode($result);

		    if(isset($result->errorCode)){
		    	
		    		$status = 'error';
					$errormeg = __('OTP code verification failed. May be expired or incorrect. Please try again!', 'fitzMe');
		    	
		    }else{
		    	if($result->status=='SUCCESSFUL'){
		    		$status = 'success';
					$errormeg = __('OTP verification successfully.', 'fitzMe');
		    	}else{
		    		$status = 'error';
					$errormeg = __('OTP code verification failed. May be expired or incorrect. Please try again!', 'fitzMe');    		
		    	}
		    	
		    }
		     			
		}
		curl_close($ch);

		$data = [
		    'status' => $status,
		    'message'=> $errormeg,
		]; 
		return new WP_REST_Response( $data, 200 );
    }
*/
?>

