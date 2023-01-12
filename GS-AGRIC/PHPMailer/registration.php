<?php
include_once("init.php");
?>
<?php

require_once 'vendor/autoload.php';
use PHPMailer\phpmailer\phpmailer;
use PHPMailer\phpmailer\Exception;

require 'smtp-config.php';
require_once 'PHPMailer/vendor/autoload.php';
require_once 'vendor/autoload.php';

$error = NULL;

if(isset($_POST['submit'])){
     
    $u = $_POST['u'];
    $e = $_POST['e'];
    $p = $_POST['p'];
    $p2 = $_POST['p2'];

    //Cheaking if usename is less than 5
    if(strlen($u) < 3){
        $error = "<p>Your Username must be at least 3 characters!</p>";
    }elseif($p2 != $p){
        $error = "<p>Your Username and Password do not match</p>";
    }else{
        
        // Form is valild
        
       $mysqli = NEW MySQLi('localhost', 'root', '','posnic');
        
        //Sanitise form data for sql injection by the users
        $u = $mysqli->real_escape_string($u);
        $e = $mysqli->real_escape_string($e);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);
        
        //Generate vkey
        $vkey = md5(time().$u);
        // echo '<p>'.$vkey.'</p>';
        
        //insert account into database
        $p = md5($p);
        $insert = $mysqli->query("INSERT INTO accounts(username,email,password,vkey)VALUES('$u','$e','$p','$vkey')");
        if($insert){

           // include('sendEmailFunction.php');
            
            //echo "SUccess";
           /* 
           $to = $e;
           $subject = "Email verification";
            $message = "<a href='http:8082//registration/verify.php?vkey=$vkey'>Register Account</a>";
            $headers = "FROM: tboysure4real@gmail.com \r\n";
            $headers .= "MIME-version:1.0 .\r\n";              
            mail($to,$message, $subject, $headers);
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";
           */


 // allow for demo mode testing of emails
 define("DEMO", false); // setting to TRUE will stop the email from sending.
 // set the location of the template file to be loaded
 $template_file = "Template.php";
 //Email address to spam
   //    include("db_connect.php");
   //    $company_email=mysqli_real_escape_string($conn,$_POST["company_email"]);

 // set the email 'from' information
 $email_from = "EVALUATION <tboysure@gmail.com>";

// Import PHPMAILER clases into the global namespace
$mail = new PHPMailer(true);
  
try {
    //$mail->SMTPDebug = 0;                                       
    $mail->isSMTP();
    $mail->Timeout = 120;
    $mail->SMTPKeepAlive = true;
    $mail->SMTPOptions = array('ssl' => array(
     'verify-peer' =>false,
     'verify-peer-name' => false,
     ' allow-self-signed' => true
     )
     );
    $mail->Mailer = "smtp";
    $mail->Host       = $smpthost;                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = $smtpuser;                 
    $mail->Password   = $smtppass;                      
    $mail->SMTPSecure = "ssl";                              
    $mail->Port = 465;  
    $mail->SMTPAuto = true;
    $mail->setFrom = "EVALUATION <tboysure4real@gmail.com>";      
    //$mail->addAddress("tboysure4real@gmail.com");
    $mail->addAddress("tboysure4real@gmail.com", "tboysure");

    // create a list of the variables to be swapped in the html template
	$swap_var = array(
		"{SITE_ADDR}" => "http://mitchelleagrotech.com",
		//"{EMAIL_LOGO}" => "<html><img src='http://mitchelleagrotech.com/' style='height:100px'/></html>",
		"{EMAIL_TITLE}" => "Congratulations!!!",
		"{EMAIL_SUBJECT}" => "EVALUATION PAGE",
		"{EMAIL}" => "$e",
		//"{REGNO}" => "$regno",
		//"{DEPT}" => "$dept",11
		"{FNAME}" => "$u",
		//"{LEVEL}" => "$level",
		//"{SEMESTER}" => "$ster"
	);


  $email_headers = "From: ".$mail->setFrom."\r\nReply-To: ".$mail->setFrom."\r\n";
	$email_headers .= "MIME-Version: 1.0\r\n";
	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  
    // load the email to and subject from the $swap_var
    $mail->addAddress = $swap_var['{EMAIL}'];
    $mail->Subject = $swap_var['{EMAIL_SUBJECT}']; // you can add time() to get unique subjects for testing: time();


    //$Mail->Priority = 1;
    
     //$mail->isHTML(true);                                  
    //$mail->Subject = 'Registration Page';

    
	// load in the template file for processing (after we make sure it exists)
	if (file_exists($template_file))
  $mail->Body = file_get_contents($template_file);
else
  die ("Unable to locate your template file");

// search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
foreach (array_keys($swap_var) as $key){
  if (strlen($key) > 2 && trim($swap_var[$key]) != '')
    $email->body = str_replace($key, $swap_var[$key], $email->body );
}

    //$mail->Body    = 'HTML message body in <b>bold</b>  Iam still testing ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
   // $mail->Body = "You are Welcome to Attendane Managemet System Activation Page<br><br>
    //<a href='http://localhost:8082/mailer/PHPMailer/verify.php?vkey=$vkey'>Click here to Validate your Account</a>";

    // send the email out to the user	
    $mail->WordWrap = 50;
  if($mail->Send()){   
            //header("localhost:8082/mailer/PHPMailer/verify.php");
            echo 'message has been sent to your mail for validation';
        }else{
           echo "Check your Internet Connection!";
          // echo '<script type="text/javascript">alert("Account has not been verified"</script>';
           // echo $mysqli->error;
        }
    } catch (Exception $e) {
    echo "Message could not be sent! possible cause are 1.Internet Connection.
    2.Antivirus. 3. Windows defender. 3.SMTP Configuration.  Mailer Error:{$mail->ErrorInfo}";
}

    }

    echo '<script type="text/javascript">alert("Account has not been verified"</script>';
}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Registration with Email Verification in PHP</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="style.css">
<style>
*{
  background-color:off-white;
}
</style>
</head>
<body>
<div class="card-body">
<form action="" method="post"  class="center">
<!--<fieldset>
<legend>User Registration with Email Verification</legend>
    -->
    <table align="center" width="50%" border="0" paddiing="5">
<tr>
  <td align="right">Username</td>
  <td><input type="text" name="u" required></td>
</tr>                                
<tr>
  <td align="right">Email address</td>
 <td><input type="email" name="e"  id="email"  required></td>
</tr>
<tr>
  <td align="right">Password</td>
  <td><input type="password" name="p"  id="password" required="*"></td>
</tr>                   
<tr>
  <td align="right">Confirm Password</td>
  <td><input type="password" name="p2"  id="cpassword" required="*"></td>
</tr>   
<td colspan="2" align="center"><input type="submit" name="submit" value="Register"></td>
</table>
</form>
<center>
 <?php
 echo $error;
?>   
</center>
</div>
</body>
</html>