<!Doctype html>
<html>

<head>
<meta charset="utf-8">
<title> Arithmetic Calculator </title>
</head>

<body>

<p align="center">
Arithmetic Calculator (Plus / Minus / Multiply / Division)
</p>

<br>
<?php
@$first=$_POST['first'];
@$second=$_POST['second'];
if(isset($_POST['plus']))
{
$plus=$first+$second;
echo '<table align="center">
<tr>
<td style="color:red;">Answer is: &nbsp;&nbsp;&nbsp;</td>
<td><input type="text" value="'.$plus.'" readonly/></td>
</tr>
</table>';
}
else if(isset($_POST['minus']))
{
$minus=$first-$second;
echo '<table align="center">
<tr>
<td style="color:red;">Answer is: &nbsp;&nbsp;&nbsp;</td>
<td><input type="text" value="'.$minus.'" readonly/></td>
</tr>
</table>';
}
else if(isset($_POST['multiply']))
{
$multiply=$first*$second;
echo '<table align="center">
<tr>
<td style="color:red;">Answer is: &nbsp;&nbsp;&nbsp;</td>
<td><input type="text" value="'.$multiply.'" readonly/></td>
</tr>
</table>';
}
else if(isset($_POST['divide']))
{
$divide=$first/$second;
echo '<table align="center">
<tr>
<td style="color:red;">Answer is: &nbsp;&nbsp;&nbsp;</td>
<td><input type="text" value="'.$divide.'" readonly/></td>
</tr>
</table>';
}
?>

<form action="" method="post">
<table align="center">
<tr>
<td> First Value </td>
<td><input type="text" name="first" /></td>
</tr>
<tr>
<td> Second Value </td>
<td><input type="text" name="second" /></td>
</tr>
</table>
<table align="center">
<tr>
<td><input type="submit" name="plus" value="+"></td>
<td><input type="submit" name="minus" value="-"></td>
<td><input type="submit" name="multiply" value="*"></td>
<td><input type="submit" name="divide" value="/"></td>
</tr>
</table>
</form>

</body>
</html>