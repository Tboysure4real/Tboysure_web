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
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
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
.print1{
display: hidden;
}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('dashboard').style.visibility="hidden";
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('dashboard').style.visibility="visible";
document.getElementById('printButton').style.visibility="visible";  
}
</script>
<body>
<a href="dashboard.php" class="active-tab dashboard-tab" id="dashboard"><button type="button">Dashboard</button></a>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

<body>

    <div class="qc_report">
    <p>
    <img src="upload/Hafiz Super Store.png" width="150px" style="margin-left:600px"/>
    <h1 style="color:#1a4567"><strong style="margin-left:530px">HOUSEKEEPING REPORT</strong</h1>
    </p>
</div>

    
    <table>
				
	
						
    <tr>
								<th>No</th>								
								<th>hous Id</th>
                                <th>Date</th>
								<th>surrounding</th>							
								<th>M.Cloak</th>
								<!--<th>Roller Conveyor</th>-->
                                <th>F.Cloak</th>
								<th>M.Toilet</th>
                                <th>F.Toilet</th>
                                  <!--<th>Head Puller</th>-->
                                  <th>offices</th>
                                  <th>Remark</th>
                                
                                                          
                                                                 <th>Print</th>
                                                                <td></td>
							</tr>
<?php $i=1; $no=$page-1; $no=$no*$limit;



$sql = "SELECT * FROM housekeeping";
	
	if(isset($_POST['date']))
{

$sql = "SELECT * FROM housekeeping WHERE name observation	 '%".$_POST['searchtxt']."%'  LIMIT $start, $limit";

}

	$result = mysqli_query($conn,$sql);


$sql = "SELECT * FROM housekeeping ORDER BY `id` ASC LIMIT $start, $limit ";

while($row = mysqli_fetch_array($result)) 
{
 ?> 
 <tr>
 <td> <?php echo $row['id'];?></td>
 <td> <?php echo $row['housId'];?></td>
   <td> <?php echo $row['mysqldate'];?></td>
<td> <?php echo $row['surrounding']; ?></td>
 <td> <?php echo $row['maleCloak']; ?></td>   

<td> <?php echo $row['femaleCloak']; ?></td>
<td> <?php echo $row['maleToilet']; ?></td>
<td> <?php echo $row['femaleToilet']; ?></td>

<td> <?php echo $row['offices']; ?></td>
  <td> <?php echo $row['remark']; ?></td>





 <td><a  href=print_housekeeping.php?id="<?php echo $row['id'];?>" target="_blank">print</a>
 </td>

</tr>
<?php $i++; } ?>
     
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