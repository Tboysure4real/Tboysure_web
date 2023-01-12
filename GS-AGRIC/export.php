<?php
//Add script to read MySQL data and export to excel
include("read_and_export.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Export MySQL Data to Excel using PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

 <!-- Stylesheets -->
 <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
<script
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="active-tab dashboard-tab">Dashboard</a></li>
               <li><a href="chemicalUsageLog.php" class="chem-tab">Chemical Log</a></li>
				<li><a href="slaughteringLine.php" class="purchase-tab">Slaughter</a></li>
				<!--<li><a href="slaugheringLine.php" class=" Slughtering Line-tab">Supplier</a></li>-->
				<li><a href="evisceration.php" class=" transfer-tab">Evisceration</a></li>
                <li><a href="scaleCalibration.php" class="scale-tab">Scale Caliberation</a></li>
				<li><a href="chillerSection.php" class="info-tab">Chiller</a></li>
                <li><a href="packagingSection.php" class="pack-tab">Packaging</a></li>
                <li><a href="gradingBlastFreezer.php" class="cart-tab">Blast Freezer</a></li>
                <li><a href="housekeeping.php" class="cart-tab">Housekeeping</a></li>

			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/MITCHELLE.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

<div class="container">
<!--<center><br/><br/><h2
 style='color:blue'><strong>Items Table Information</strong></h2></center>-->
<div class="col-sm-12">
<div>
<form action="#" method="post">
<button type="submit" id="export" name="export"
 value="Export to excel" class="btn btn-success">Export To Excel</button>

 &nbsp;&nbsp;&nbsp;<a href="pdf_report.php"><button type="button" id="export" name="pdf_report"
 value="Export to excel" class="btn btn-warning"><strong>Export To pdf</strong></button></a>

</form>
</div>
</div>
<br/>
<table id="" class="table table-striped table-bordered">
<tr>
<th>ITEM ID</th>
<th>Name</th>
<th>UNIT COST</th>
<th>DATE</th>
<th>OPEN. STOCK</th>
<th>RECEIVER</th>
<th>SUPPLIER</th>
<th>item Used</th>
<th>TRANSFER</th>
<th>DAY COST</th>
<th>CLOSE. STOCK</th>

<tbody>
    

<?php foreach($items as $item) { ?>
<tr>
<td><?php echo $item ['itemId']; ?></td>
<td><?php echo $item ['name']; ?></td>
<td><?php echo $item ['unitCost']; ?></td>
<td><?php echo $item ['date'];; ?></td>
<td><?php echo $item ['openingStock']; ?></td>
<td><?php echo $item ['receiver']; ?></td>
<td><?php echo $item ['supplier']; ?></td>
<td><?php echo $item ['itemUsage']; ?></td>
<td><?php echo $item ['transfer']; ?></td>
<td><?php echo $item ['dayCost']; ?></td>
<td><?php echo $item ['closingStock']; ?></td>

</tr>
<?php } ?>
</tbody>
</table>
</div>

</body>
</html>