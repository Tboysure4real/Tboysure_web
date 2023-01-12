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

<a href="dashboard.php" class="active-tab dashboard-tab" id="dashboard"><button type="button">Dashboard</button></a>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

<div class="qc_report">
    <p>
    <img src="upload/Hafiz Super Store.png" width="150px" style="margin-left:600px"/>
    <h1 style="color:#1a4567"><strong style="margin-left:530px">CHEMICAL LOG  REPORT</strong</h1>
    </p>
</div>


<script src="js/google_jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(selectAll).click(function(){
    if($(this).is(":checked")){
      $(".checkItem").prop('checked',true);
    }else{
      $(".checkItem").prop('checked',false);
    }
  });
}); 
</script>
    <form name="form" method="POST">
      <input type="submit" name="submit" value="Print-Checked" onClick="return confirm('Are Sure you want to Delete?')"/>
      
    <table>
				
	
						
    <tr>         <th id="selectAll2"><input type="checkbox" id="selectAll"  /></th>
								<th>No</th>								
								<th>Chem Id</th>
                                <th>Chemical Name</th>
								<th>Date</th>							
								<th>Place Applied</th>
								<th>Mixer</th>
                                <th>Concentration Proportion</th>
                                <th>Supervisor</th>
                                <th>Remark</th>
								
                                                               
							</tr>
 <?php
if(isset($_POST['submit'])){
    if(isset($_POST['id'])){
      foreach($_POST['id'] as $id){
        $sql="DELETE FROM chemicallog WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
      }

    }
 }
 ?>

<?php $i=1; $no=$page-1; $no=$no*$limit;



$sql = "SELECT * FROM chemicallog";
	
	if(isset($_POST['date']))
{

$sql = "SELECT * FROM chemicallog WHERE name observation	 '%".$_POST['searchtxt']."%'  LIMIT $start, $limit";

}

	$result = mysqli_query($conn,$sql);


$sql = "SELECT * FROM chemicallog ORDER BY `id` ASC LIMIT $start, $limit ";

while($row = mysqli_fetch_array($result)) 
{
 ?> 
 
 <tr>         
    <td><input type="checkbox" name="selectAll" class="checkItem" value="<? $row['id'] ?>" name="id[]"/></td>
       <td> <?php echo $row['chemid'];?></td>
       <td> <?php echo $row['chemName'];?></td>
       <td> <?php echo $row['mysqldate'];?></td>
    <td> <?php echo $row['place']; ?></td>
     <td> <?php echo $row['mixer']; ?></td>   
    <td> <?php echo $row['conc']; ?></td>
  <td> <?php echo $row['supervisor']; ?></td>
  <td> <?php echo $row['remark']; ?></td>

<td><a href=print_chemical_log.php?id="<?php echo $row['id'];?>">print</a>
    </td>
		                                                                       
<?php $i++; } ?>

<td align="center" colspan="2"><div style="margin-left:20px;" class="print1"><?php echo $pagination; ?></div></td>

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