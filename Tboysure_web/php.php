<!Doctype html>
<html>
 <head>
  <title>PHP Tester</title>
 </head>
 <body>
 <h1>Jesus is lord!</h1>
 <?php
 $studentName=$_POST['studentName'];
 $grade=$_POST['grade'];
 $section=$_POST['section'];
 $teacher=$_POST['teacher'];
 
 echo "<h1>Student Information</h1>";
 echo 'student Name is ' .$student .'</br>';
 echo 'he is in grade' .$grade .'</br>';
 echo 'He is in section' .$section.'</br>';
 echo 'He was taught by' .$teacher .'</br>';
 ?>
 </body>
</html>