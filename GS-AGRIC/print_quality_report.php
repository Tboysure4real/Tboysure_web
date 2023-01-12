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
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	
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
document.getElementById('printMarked').style.visibility="hidden";  
document.getElementById('dashboard').style.visibility="hidden";

window.print();
document.getElementById('printButton').style.visibility="visible";  
document.getElementById('printMarked').style.visibility="visible";  
document.getElementById('dashboard').style.visibility="visible";

}

</script>


<script src="js/google_jquery.js"></script>
<script type="text/javascript">
 /*
  $(document).ready(function(){
    var mytable = $("#table").DataTable({
      ajax: 'data.json',
      columnDefs: [
        {
          target:0,
          checkboxes:{
            selectRow: true;

          }
        }
      ],
      select: {
        style: 'multi'
      },
      order: [[1, 'asc']]
    })
     $("#myform")on('submit', function(e) {
      var form = this
      var rowsel = mytable.column(0).checkboxes.selected();
      $.each(rowsel, function(index, rowId){
       $(form)append(
         $(input).attr('type', 'hidden').attr('name', 'id[]').val(rowId)
       )
      })
      $("#view-rows").text(rowsel.join(","))
      $("#view-form").text($(form).serialize())
      $('input[name="id[\]"]', form).remove()
      e.preventDefault()
     })
  })
 */ 
</script>


<?php
if(isset($_POST['print2'])){
    //echo $_POST['check'];
    foreach ($_POST['check'] as $value) {
        echo $value ."</br>";
        echo "Jesus is Lord!";
    }
} 
?>
<script src="js/google_jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
       $("#myform #select-all").click(function(){
          $("#myform input[type='checkbox']").prop('ckecked',this.checked);
       });
    });

$(document).ready(function(){
$("#select-all").click(function(){
    if($(this).is(":checked")){
        $(".checkItem").prop('checked',true);
    }else{
        $(".checkItem").prop('checked',false);
    }
})
});
    </script>
<a href="dashboard.php" class="active-tab dashboard-tab" id="dashboard"><button type="button">Dashboard</button></a>

<input name="print" type="button" value="Print-All" id="printButton" onClick="printpage()">



    <div class="qc_report">
    <p>
    <img src="upload/Hafiz Super Store.png" width="150px" style="margin-left:600px"/>
    <h1 style="color:#1a4567"><strong style="margin-left:530px">QUALITY ASSURANCE REPORT</strong</h1>
    </p>
</div>

 <form name="myform" method="POST">  
 <input type="submit"  name="submit" value="Print-Marked" id="printMarked" onClick="printMarked()">
  <!--<p><b>Selected Row Data</b></p> 
  <pre id="view-rows"></pre>
  <p><b>Form Data as Submitted to the Server</b></p>
-->
    <table id="mytable">
				
	            <thead>
							<tr>
                          <!--<th id="select-all2"> <input type="checkbox" id="select-all"  /></th>-->
                            
<th>Date</th>								
                            <th>OBSERVATION</th>
                            <th>Condition of Birds @ Arrival</th>
                            <th>Health Certificate Issued?</th>
                            <th>Total No of Birds</th>
                            <!----<th>Stunning Volatage</th>-->
                            <th>Bleeding Time</th>
                            <th>Scalding Temp.</th>
                            <th>Carcass Apperance</th>
                            <!--<th>Graded Temp.</th>-->
                            <th>Calibration</th>
                            <th>Exit Birs Temp.</th>
                            <th>Mortality</th>
                            <th>Chlorine Dosage</th>
                            <th>Product Produced</th>
</tr>
</thead>

<?php $i=1; $no=$page-1; $no=$no*$limit;



$sql = "SELECT * FROM  quality_report order by id";



//CODE TO PRINT SELECTED/CHECKED FIELDS
if(isset($_POST['submit'])){
  // echo "Jesus is Lord";
    if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
      $sql= ("SELECT * FROM quality_report WHERE id=$id;");
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($result))
{
 ?> 
	<tr> 
  <!--<td><input type="checkbox" class="checkItem" value="<?= $row['id'] ?>"
     name="id[]"/></td>-->
   <td> <?php echo $row['mysqldate'];?></td> 
	  <td> <?php echo $row['observation'];?></td>
      <td> <?php echo $row['birdsCondition'];?></td>
   <td> <?php echo $row['certificate']; ?></td>  
   <td> <?php echo $row['numberWeight']; ?></td>
 <td> <?php echo $row['bleedingTime']; ?></td>

 <td> <?php echo $row['scaldingTemp']; ?></td>
 <td> <?php echo $row['carcassAppear']; ?></td>
 <td> <?php echo $row['calibration']; ?></td>
 <td> <?php echo $row['birdsTemp']; ?></td>
 <td> <?php echo $row['mortality']; ?></td>
 <td> <?php echo $row['dosage']; ?></td>
 <td> <?php echo $row['product']; ?></td>
 <script  type="text/javascript">
document.getElementById('select-all').style.visibility="hidden";
document.getElementById('select-all2').style.visibility="hidden";
document.getElementById('folow').style.visibility="hidden";


</script>
 <?php
    }
 }
}
 $i++; } ?>


<?php
	if(isset($_POST['date']))
{

$sql = "SELECT * FROM quality_report WHERE name observation	'%".$_POST['searchtxt']."%'  LIMIT $start, $limit";

}

	$result = mysqli_query($conn,$sql);


//$sql = "SELECT * FROM quality_report ORDER BY id ASC LIMIT $start, $limit ";
$sql = "SELECT * FROM  quality_report order by id";
while($row = mysqli_fetch_array($result)) 
{
 ?> 
	<tr> 
   <!--<td><input type="checkbox" class="checkItem" value="<?= $row['id'] ?>"
     name="id[]"/></td> -->
   <td> <?php echo $row['mysqldate'];?></td> 
	  <td> <?php echo $row['observation'];?></td>
      <td> <?php echo $row['birdsCondition'];?></td>
   <td> <?php echo $row['certificate']; ?></td>  
   <td> <?php echo $row['numberWeight']; ?></td>
 <td> <?php echo $row['bleedingTime']; ?></td>

 <td> <?php echo $row['scaldingTemp']; ?></td>
 <td> <?php echo $row['carcassAppear']; ?></td>
 <td> <?php echo $row['calibration']; ?></td>
 <td> <?php echo $row['birdsTemp']; ?></td>
 <td> <?php echo $row['mortality']; ?></td>
 <td> <?php echo $row['dosage']; ?></td>
 <td> <?php echo $row['product']; ?></td>


<td id="folow"><a href=previer_quality_report.php?id="<?php echo $row['id'];?>">print</a>
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
