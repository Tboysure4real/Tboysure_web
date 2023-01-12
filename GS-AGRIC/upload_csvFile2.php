<?php
include_once("init.php");
$conn = mysqli_connect("localhost", "root","","posnic");
?>

<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $itemId = "";
            if (isset($column[0])) {
                $userId = mysqli_real_escape_string($conn, $column[0]);
            }
            $name = "";
            if (isset($column[1])) {
                $name = mysqli_real_escape_string($conn, $column[1]);
            }
            $quantity_given = "";
            if (isset($column[2])) {
                $quantity_given = mysqli_real_escape_string($conn, $column[2]);
            }
            $user = "";
            if (isset($column[3])) {
                $user = mysqli_real_escape_string($conn, $column[3]);
            }
            $unit = "";
            if (isset($column[4])) {
                $unit = mysqli_real_escape_string($conn, $column[4]);
            }
            $category = "";
                if (isset($column[5])) {
                $category = mysqli_real_escape_string($conn, $column[5]);
            }
            $quantity_used = "";
                if (isset($column[6])) {
                 $quantity_used = mysqli_real_escape_string($conn, $column[6]);
            }
            $stock = "";
                 if (isset($column[7])) {
                  $stock = mysqli_real_escape_string($conn, $column[7]);
                 }
            $description = "";
                  if (isset($column[8])) {
                  $description = mysqli_real_escape_string($conn, $column[8]);
       
    
            }
            
            $sqlInsert = "INSERT into items (itemId,name,unitCost,date,openingCost,receiver,supplier,itemUsed,'transfer,dayCost,closingStock)
                   values (?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "sssssssss";
            $paramArray = array(
                $itemId,
                $name,
                $unitCost,
                $date,
                $openingCost,
                $receiver,
                $supplier,
                $itemUsed,
                $transfer,
                $dayCost,
                $closingStock
            );

            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (!empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
   
    }
}
?>
<!DOCTYPE html>
<html>

<head>

<!-- Stylesheets -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
<script src="jquery-3.2.1.min.js"></script>

<style>
body {
    font-family: Arial;
    width: auto;
    align-content: center;
    align-items: center;
}
h2{
    margin-left: 120px;
    margin-top: 50px;
    color: blue;
}
.thead-dark{
    background-color: black;
    color:white;
}

.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}

.btn-view{
    margin-top: 20px;
    margin-right: 100px;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>

<body>
    
<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="view_customers.php" class=" customers-tab">Customers</a></li>
				<li><a href="view_purchase.php" class="purchase-tab">Purchase</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
				<li><a href="view_product.php" class="active-tab stock-tab">Stocks / Products</a></li>
				<li><a href="view_report.php" class="report-tab">Reports</a></li>
                <li><a href="Items.php" class="report-tab">Items</a></li>
                <!--<li><a href="Items.html" class="chat-tab">Items</a></li>-->
				<li><a href="chat.html" class="chat-tab">Chat</a></li>

			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/MITCHELLE.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>

        <h2><strong>Import External CSV File Here</strong></h2>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>

                        <button type="submit" id="view_data" name="view_data"
                        class="btn-view" >View Data</button>
                   

                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM items";
            $result = $db->select($sqlSelect);
// To display data in the database on the form
  if(isset($_POST['view_data'])){
            if (! empty($result)) {
                ?>
            <table id='userTable'>
            <thead class="thead-dark">
                <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <th>Quantity Given </th>
                    <th>User </th>
                    <th>Unit</th>
                    <th>Category</th>
                    <th>Quantity Used</th>
                    <th>Stock</th>
                    <th>Description</th>

                </tr>
            </thead>
<?php
                
                foreach ($result as $row) {
                    ?>
                    
                <tbody>
                <tr>

                    <td><?php  echo $row['itemId']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                    <td><?php  echo $row['quantity_given']; ?></td>
                    <td><?php  echo $row['user']; ?></td>
                    <td><?php  echo $row['unit']; ?></td>
                     <td><?php  echo $row['category']; ?></td>
                    <td><?php  echo $row['quantity_used']; ?></td>
                    <td><?php  echo $row['stock']; ?></td>
                     <td><?php  echo $row['description']; ?></td>
                   

                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
        <?php } ?>
    </div>

</body>

</html>