<?php
require_once '../private/init.php';
global $evisit_db;
header("Content-Type:application/json");
if (isset($_GET['vitals']) && $_GET['vitals'] != "1") {
	// getting latest vitals
	$sql = "SELECT * FROM vitals ORDER BY ID DESC LIMIT 1"; 
	$result = mysqli_query($evisit_db, $sql);
	if(mysqli_num_rows($result)>0) {
		$vitalsRow = mysqli_fetch_assoc($result);
		$vid = $vitalsRow['id'];
		$oxsat = $vitalsRow['oxsat'];
   		$heartrate = $vitalsRow['heartrate'];
    	$BP = $vitalsRow['BP'];
    	$temp = $vitalsRow['temp'];
		$sql2 = "SELECT * FROM appointments WHERE vid = ' " . $vid . "'";
		$result2 =  mysqli_query($evisit_db, $sql2);
		if(mysqli_num_rows($resul2)>0){
			// getting appointment associated with latest vitals
			$appsRow = mysqli_fetch_assoc($result2);
			$uid = $appsRow['uid'];
			$checkedIn = $appsRow['checkedin'];
			// getting user with latest appointment
			$sql3 = "SELECT * FROM users WHERE id = ' " . $uid . "'";
			$result3 =  mysqli_query($evisit_db, $sql3);
			if(mysqli_num_rows($resul3)>0) {
				$usersRow =  mysqli_fetch_assoc($result3);
				$name = $usersRow['first_name'] . ' ' . $usersRow['last_name'];
			} else{
				response($name,$uid,$checkedIn,$oxsat,$heartrate,$BP,$temp,403);
			}
		} else{
			response("Not Found",$uid,$checkedIn,$oxsat,$heartrate,$BP,$temp,0);
		}
		} else{
			response("Not Found","Not Found","Not Found",$oxsat,$heartrate,$BP,$temp,403);
		}
} else{
	response("Invalid Request","Invalid Request","Invalid Request","Invalid Request","Invalid Request","Invalid Request","Invalid Request",400);
	}

function response($name,$uid,$checkedIn,$oxsat,$heartrate,$BP,$temp,$return){
	$response['name'] = $name;
	$response['uid'] = $uid;
	$response['checkedIn'] = $checkedIn;
	$response['oxsat'] = $oxsat;
	$response['heartrate'] = $heartrate;
	$response['BP'] = $BP;
	$response['temp'] = $temp;
	$response['return'] = $return;

	$json_response = json_encode($response);
	echo $json_response;
}
?>