<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <?php
      //include 'db.php';
      include_once("init.php");

      $sql="SELECT pdf FROM pdf_data";
      $query=mysqli_query($conn,$sql);
      while($info=mysqli_fetch_array($query)) {
        ?>
     <embed type="application/pdf" src="pdf_data/<?php echo $info['pdf'] ; ?>" width="900" height="500">
        
      <?php
      }

      ?>
  
    </div>

  </body>
</html>
