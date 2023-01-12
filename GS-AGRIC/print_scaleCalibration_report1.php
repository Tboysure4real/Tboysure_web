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
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('printButton').style.visibility="hidden";  

window.print();
document.getElementById('printButton').style.visibility="visible";
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
    <h1 style="color:#1a4567"><strong style="margin-left:530px">SCALE CALIBRATION REPORT</strong</h1>
    </p>
</div>

    
    <table>
				
	
    <tr>
								<th>No</th>
								<th>section</th>								
								<th>secId</th>
                                <th>Date</th>
								<th>capacity</th>							
								<th>weight</th>
								<!--<th>Roller Conveyor</th>-->
                                <th>callTime1</th>
                                <th>callTime2</th>
                                  <th>callTime3</th>
                                  <th>calibrator</th>
								  <th>qc</th>
								  <th>manager</th>
                                  <th>Remark</th>
                                
                                                          
                                                                 <th>Print</th>
                                                                <td></td>
							</tr>

<?php $i=1; $no=$page-1; $no=$no*$limit;



$sql = "SELECT * FROM scalecalibration";
	
	if(isset($_POST['date']))
{

$sql = "SELECT * FROM scalecalibration WHERE name observation	 '%".$_POST['searchtxt']."%'  LIMIT $start, $limit";

}

	$result = mysqli_query($conn,$sql);


$sql = "SELECT * FROM scalecalibration ORDER BY `id` ASC LIMIT $start, $limit ";

while($row = mysqli_fetch_array($result)) 
{
 ?> 
	<tr>
   <td> <?php echo $no+$i; ?></td>
   <td> <?php echo $row['section'];?></td>
      <td> <?php echo $row['secId'];?></td>
      <td> <?php echo $row['mysqldate'];?></td>
   <td> <?php echo $row['capacity']; ?></td>
    <td> <?php echo $row['weight']; ?></td>   
   <td> <?php echo $row['callTime']; ?></td>
   <td> <?php echo $row['callTime2']; ?></td>
  <td> <?php echo $row['callTime3']; ?></td>
   <td> <?php echo $row['calibrator']; ?></td>
   <td> <?php echo $row['qc']; ?></td>
   <td> <?php echo $row['manager']; ?></td>
     <td> <?php echo $row['remark']; ?></td>

<td><a href=print_scaleCalibration_report.php?id="<?php echo $row['id'];?>">print</a>
    </td>
		
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