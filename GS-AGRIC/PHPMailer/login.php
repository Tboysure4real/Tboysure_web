<?php 
$error = NULL;

if(isset($_POST['submit'])){

    $mysqli = NEW MySQLI('localhost','root','','crud');
     
    $u = $mysqli->real_escape_string($_POST['u']);
    $p = $mysqli->real_escape_string($_POST['p']);
    $p = md5($p);

    $resultset = $mysqli->query("SELECT * FROM accounts WHERE username = '$u' AND password = '$p' LIMIT 1");


if($resultset->num_rows !=0){
    //process login
        $row = $resultset->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];
        $date = $row['createdate'];
        $date = strtotime($date);
        $date = date('M D Y',$date);
    if($verified ==1){
        //continue processing
       echo 'Your account is verified and you have been logged in.';
    }else{
      $error =" This Account has not yet been verified. An email was sent to $email on $date";  
    }

}else{
    $error = "The username and password you entered is not correct";
      
}
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login Page</title>
</head>
<body>
<form action="" method="post"  class="center">
<!--<fieldset>
<legend>User Registration with Email Verification</legend>
    -->
    <table align="center"  border="0" cellpaddiing="5">                               
<tr>
  <td align="right">Username</td>
 <td><input type="TEXT" name="u"  required></td>
</tr>
<tr>
  <td align="right">Password</td>
  <td><input type="password" name="p" required="*"></td>
</tr>                   
<td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
</table>
</form>
<center>
    <?php echo $error; ?> 
</center>
</body> 
</html>