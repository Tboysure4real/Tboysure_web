<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autnoneocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>	  
    
<style type="text/css" media="print">
.hide{display:table;}
@media print{
  #printButton{
    display: table;
  }
    body {
  /*color: #1a4567 !important;*/
  -webkit-print-color-adjust: exact;}
}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('printButton').style.visibility="hidden";

window.print();
document.getElementById('printButton').style.visibility="visible";
document.getElementById('printButton').style.visibility="visisble";

}
</script>
<body>
<a href="dashboard.php" class="active-tab dashboard-tab" id="dashboard"><button type="button">Dashboard</button></a>

<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

<!--print function
    window.print(mysqli_query($conn,"SELECT * FROM quality_report WHERE id=$id;"));-->
   <!-- <div class="qc_report"><a href="#">print</a>-->
    <p>
    <img src="upload/Hafiz Super Store.png" width="150px" style="margin-left:600px"/>
    <h1 style="color:#1a4567;"><strong style="margin-left:530px">PACKAGING SECTION REPORT</strong</h1>
    </p>
</div>

    
    <table>
				
	
				
   
    <tr>
								<th>No</th>								
								<th>pckg Id</th>
                 <th>Date</th>
								<th>weighingMachine</th>							
								<th>drainer </th>
								<!--<th>Roller Conveyor</th>-->
                 <th>workingTable</th>
								<th>polyclipMachine</th>                            
								<th>Remark</th>
                                
							</tr>	
									
                          
<?php
if(isset($_GET['id'])  && $_GET['id']!=''  ){

  $id=$_GET['id'];

    //$sql= $db->query("SELECT * FROM quality_report WHERE id='$id'");
	  
	  //$result = mysqli_query($conn,$sql);
     // $result = mysqli_query($conn,$sql);  

$sql= mysqli_query($conn,"SELECT * FROM packagingsection WHERE id=$id;");
   while($row = mysqli_fetch_array($sql)) {
    
    //$id=$_GET['id'];
     //$result = $conn->query($sql);
     //while($row=$result->fetch_assoc()){
//while($line = $db->fetchNextObject($result)) {

 ?> 
 <!--<script type="text/javascript">

window.print();
window.location.href="previer_quality_report.php"
</script>-->

<tr>
	<td> <?php echo $row['id'];?></td>
      <td> <?php echo $row['pckgId'];?></td>
      <td> <?php echo $row['mysqldate'];?></td>
   <td> <?php echo $row['weighingMachine']; ?></td>
    <td> <?php echo $row['drainer']; ?></td>   
  
   <td> <?php echo $row['workingTable']; ?></td>
   <td> <?php echo $row['polyclipMachine']; ?></td>
 <td> <?php echo $row['remark']; ?></td>
</tr>
<?php $i++; }
      }
 
?>

<td align="center" colspan="2"><div style="margin-left:20px;"><?php echo $pagination; ?></div></td>


</tr>
</tbody>
</table>
</form>
				
				
		</div> 
	</div> 
		<div id="footer">
			<p>Copyright &copy; 2022 GS AGRIC</p>	
	</div> <!-- end footer -->

</body>

</html>