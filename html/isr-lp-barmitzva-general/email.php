<?php
if($_POST)
{
	
    $to_Email       = "doni@vertex9.com"; //Replace with recipient email address
    $subject        = 'Glance Contact Form'; //Subject line for emails
   
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
   
        //exit script outputting json data
        $output = json_encode(
        array(
            'type'=>'error',
            'text' => 'Request must come from Ajax'
        ));
       
        die($output);
    }
   
    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userPhone"]) )
    {
        $output = json_encode(array('type'=>'error', 'text' => 'שדות קלט ריקים!'));
        die($output);
    }

    //Sanitize input data using PHP filter_var().
    $user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $user_Phone       = filter_var($_POST["userPhone"], FILTER_SANITIZE_STRING);
	
   
    //additional php validation
    if(strlen($user_Name)<4) // If length is less than 4 it will throw an HTTP error.
    {
        $output = json_encode(array('type'=>'error', 'text' => 'שם הוא קצר או ריק מדי!'));
        die($output);
    }
    if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
    {
        $output = json_encode(array('type'=>'error', 'text' => 'נא להזין דוא"ל חוקי!'));
        die($output);
    }
    if(!is_numeric($user_Phone)) //check entered data is numbers
    {
        $output = json_encode(array('type'=>'error', 'text' => 'רק מספרים מורשים בשדה טלפון'));
        die($output);
    }
	
	$user_Message =
		'Name: ' . $user_Name . "\r\n" .
		'Email: ' . $user_Email . "\r\n" .
		'Phone: ' . $user_Phone . "\r\n";
	
	// Headers
	$headers = 'From: ' . $user_Email . "\r\n" .
			   'Reply-To: ' . $user_Email . "\r\n";	
   
   $sent = mail( $to_Email,$subject,$user_Message,$headers );
   
    // send mail
    if( !$sent ) {

		$output = json_encode(array('type'=>'error', 'text' => 'לא יכולתי לשלוח דואר!' ));
        die($output);
		
    } else {
		
		$output = json_encode(array('type'=>'message', 'text' => 'היי ' . $user_Name . ' תודה לך על הדואר האלקטרוני שלך'));
        die($output);		
	
    }
   

}
?>