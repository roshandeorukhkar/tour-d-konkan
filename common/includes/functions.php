<?php
//***************************************************************************************************************************************************************
// ALL COMMON FUNCTIONS FOR USER AREA WILL BE HERE
//***************************************************************************************************************************************************************

function getCurDate()
{
	return date("Y-m-d H:i:s");
}	

/* function definition to redirect the page */
function redirect_to_link($link_path) {
	
	echo "<script type='text/javascript'>window.location.href='".$link_path."'</script>";
	exit();
}


/* function definition to add adslashes in post values */
function return_post_value($post_value) {
	if(get_magic_quotes_gpc())
		return trim($post_value);
	else
		return addslashes(trim($post_value));
}

/* function definition to add stripslashes in fetched values */
function return_fetched_value($fetched_value) {
	return stripslashes(trim($fetched_value));
}
/**
 * send_mail
 * function definition to send mail by php mail() function
 * @param $to, $body, $subject, $fromaddress, $fromname
 * @return boolean true/false
 */
 function send_mail($to, $body, $subject, $fromaddress, $fromname){
$eol="\r\n";
//$mime_boundary=md5(time());

# Common Headers
$headers = "From: ".$fromname."<".$fromaddress.">".$eol;
$headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
$headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol; // these two to set reply address
$headers .= "Content-type: text/html; charset= iso-8859-1\r\n "; // these two to set reply address

$headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
$headers .= "X-Mailer: PHP v".phpversion().$eol; // These two to help avoid spam-filters

# HTML Version
//$msg .= "Content-Type: text/html; charset=iso-8859-1".$eol;
//$msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$msg = $body.$eol.$eol;

# SEND THE EMAIL
ini_set(sendmail_from,$fromaddress); // the INI lines are to force the From Address to be used !
$mail_sent = mail($to, $subject, $msg, $headers);

ini_restore(sendmail_from);

return $mail_sent;
}


function wordbreak($string, $maxlength)
{
	 $len=strlen($string);
	 if($len<=$maxlength)
	 	return $string;
	 else
	 {
	 	$string = substr($string, 0, $maxlength);
	 	return substr($string, 0, strrpos($string, " "));
	 }
} 

function tinyurl($url){
		$ch = curl_init();  
		$timeout = 50; 
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, $timeout); 
		$data = curl_exec($ch); 
		curl_close($ch); 
		return $data;
}
/***********End tinyurl********************************/
// convert a date into a string that tells how long ago that date was.... eg: 2 days ago, 3 minutes ago.
	function ago($d) {
		$c = getdate();
		$p = array('year', 'mon', 'mday', 'hours', 'minutes', 'seconds');
		$display = array('year', 'month', 'day', 'hour', 'minute', 'second');
		$factor = array(0, 12, 30, 24, 60, 60);
		$d = datetoarr($d);
		for ($w = 0; $w < 6; $w++) {
			if ($w > 0) {
				$c[$p[$w]] += $c[$p[$w-1]] * $factor[$w];
				$d[$p[$w]] += $d[$p[$w-1]] * $factor[$w];
			}
			if ($c[$p[$w]] - $d[$p[$w]] > 1) { 
				return ($c[$p[$w]] - $d[$p[$w]]).' '.$display[$w].'s ago';
			}
		}
		return '';
	}
	
	function validate_date($start_date,$end_date)
	{
		$flag=0;
		$flag_end=0;
		$msg="";		
		$msg_end="";
		
		$start_day = substr($start_date,0,2);
		$start_month = substr($start_date,3,2);
		$start_year = substr($start_date,6,4);
		//echo "<br/>";
		$end_day = substr($end_date,0,2);						
		$end_month = substr($end_date,3,2);
		$end_year = substr($end_date,6,4);
		//echo "<br/>";
		$date_object = date('d/m/Y');
		$system_day = substr($date_object,0,2);
		$system_month = substr($date_object,3,2);
		$system_year = substr($date_object,6,4);
		//echo "<br/>";
		
		$start_d = $system_day - $start_date;
		$start_m = $system_month - $start_month;
		$start_y = $system_year - $start_year;
		
		//if year is less than
		if($start_year < $system_year )
		{
			$flag = 1;
		}
		else
		{
			if($start_year == $system_year)
			{
				if($start_month < $system_month)
				{
					$flag = 1;
				}
				else
				{
					if($start_month == $system_month)
					{
						if($start_day < $system_day)
						{
							$flag = 1;
						}	
						else
						{
							if($start_day == $system_day)
							{
								$flag = 1;
							}
							else
							{
								$msg = "Start Day Invalid...";
							}
						}					
					}
					else
					{
						$msg = "Start Month Invalid...";
					}
				}
			}
			else
			{
				$msg = "Start Year Invalid...";
			}
		}
		
		if($flag == 1)
		{
			if($end_year > $system_year)
			{
				$flag_end = 1;
			}
			else
			{
				if($end_year == $system_year)
				{
					if($end_month > $system_month)
					{
						$flag_end = 1;
					}	
					else
					{
						if($end_month == $system_month)
						{
							if($end_day > $system_day)
							{
								$flag_end = 1;
							}	
							else
							{
								if($end_day == $system_day)
								{
									$flag_end = 1;
								}
								else
								{
									$msg_end = "End Day Invalid...";
								}
							}								
						}
						else
						{
							$msg_end = "End Month Invalid...";
						}
					}		
				}
				else
				{
					$msg_end = "End Year Invalid..";
				}
			}
		}
				
		
		if($flag==1 && $flag_end==1)
			return 1;
		else
			return 0;		
	}
	
?>