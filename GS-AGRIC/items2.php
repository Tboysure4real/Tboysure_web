<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Item</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
 
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
		$("#name").autocomplete("Items.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		$("#category").autocomplete("category.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				itemId: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				cost: {
					required: true,
					
				},
				sell: {
					required: true,
					
				}
			},
			messages: {
				name: {
					required: "Please Enter Stock Name",
					minlength: "Category Name must consist of at least 3 characters"
				},
				itemId: {
					required: "Please Enter Stock ID",
					minlength: "Category Name must consist of at least 3 characters"
				},
				sell: {
					required: "Please Enter Selling Price",
					minlength: "Category Name must consist of at least 3 characters"
				},
				cost: {
					required: "Please Enter Cost Price",
					minlength: "Category Name must consist of at least 3 characters"
				}
			}
		});
	
	});
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40 && unicode!=9){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
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
				<li><a href="dashboard.php" class="active-tab dashboard-tab">Dashboard</a></li>
               <li><a href="chemicalUsageLog.php" class="chem-tab">Chemical Log</a></li>
				<li><a href="slaughteringLine.php" class="purchase-tab">Slaughter</a></li>
				<!--<li><a href="slaugheringLine.php" class=" Slughtering Line-tab">Supplier</a></li>-->
				<li><a href="evisceration.php" class=" stock-tab">Evisceration</a></li>
                <li><a href="scaleCalibration.php" class="scale-tab">Scale Caliberation</a></li>
				<li><a href="chillerSection.php" class="info-tab">Chiller</a></li>
                <li><a href="packagingSection.php" class="pack-tab">Packaging</a></li>
                <li><a href="gradingBlastFreezer.php" class="cart-tab">Blast Freezer</a></li>
                <li><a href="housekeeping.php" class="cart-tab">Housekeeping</a></li>

			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Items Management</h3>
				<ul>
					<li><a href="items.php">Add Item</a></li>
					<li><a href="view_items_available.php">View Items</a></li>
					<li><a href="item_category.php">Add Item Category</a></li>
                                  
                                </ul>
                               
                                
			</div> <!-- end side-menu -->
                        
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Items Used For Production</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
                                                <div style="margin-top: 15px;margin-left: 150px"></div>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
							
					<?php
                    $stock_avail =0;
					//Gump is libarary for Validatoin
					
					if(isset($_POST['itemId'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(
						'name'    	  => 'required|max_len,100|min_len,3',
						'itemId'     => 'required|max_len,200',
						'openingStock'     	=> 'required|max_len,200',
						
						'receiver'     => 'max_len,200',
                        'usage'     => 'max_len,200',
						'transfer'     => 'max_len,200',
                         'closingStock'     => 'max_len,200',
                        'unitCost'     => 'max_len,200',
						 'dayCost'     => 'max_len,200',
						  'description'     => 'max_len,200'
					)); 
					
					$gump->filter_rules(array(
						'name'    	  => 'trim|sanitize_string|mysqli_escape',
						'itemId'     => 'trim|sanitize_string|mysqli_escape',
						'openingStock'     => 'trim|sanitize_string|mysqli_escape',
						
						'receiver'     => 'trim|sanitize_string|mysqli_escape',
						'usage'     => 'trim|sanitize_string|mysqli_escape',
						'transfer'     => 'trim|sanitize_string|mysqli_escape',
                        'closingStock'     => 'trim|sanitize_string|mysqli_escape',
						'unitCost'     => 'trim|sanitize_string|mysqli_escape',
						'dayCost'     => 'trim|sanitize_string|mysqli_escape',

                        'description' => 'trim|sanitize_string|mysqli_escape'
						
					));
				
					$validated_data = $gump->run($_POST);
                    $itemId		= "";
					$name   = "";
					$openingStock = "";
					$supplier      = "";
					$receiver    	= "";
					$usage 	= "";
					$transfer 	= "";
                    $closingStock =      "";
                    $unitCost   = "";
					$dayCost   = "";
					$description   = "";
			

					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
						
						
							$itemId=($_POST['itemId']);
							$name=($_POST['name']);
							$openingStock=($_POST['openingStock']);
							$supplier=($_POST['supplier']);
							$receiver=($_POST['receiver']);
							$usage=($_POST['usage']);
                            $transfer=($_POST['transfer']);
                            $closingStock=($_POST['closingStock']);
                            $unitCost=($_POST['unitCost']);
							$dayCost=($_POST['dayCost']);
							$description=($_POST['description']);
                            
						
						//$count = $db->countOf("items2", "name ='$name'");
		if($count>=1)
			{
	        $data='Dublicat Entry. Please Verify';
            $msg='<p style=color:red;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'GS AGRIC');
			
</script>
                                                        <?php
			}
			else
			{
                
                 //  $stock_avail = (int) $stock - (int) $quantity_used;

				if(isset($_POST['itemId'])){
				$db->query("insert into items2(itemId,name,openingStock,supplier,receiver,usage,transfer,closingStock,unitCost,dayCost,description)
				values('$itemId','$name','$openingStock','$supplier','$receiver','$usage','$transfer','$closingStock','$unitCost','$dayCost','$description')");
                

                                  $msg=" $name Added" ;
				header("Location: Items2.php?msg=$msg");
                        }else
			echo "<br><font color=red size=+1 >Problem in Adding !</font>" ;
			
					}
					
			}
			
			
			}
				
							
						
				if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'GS AGRIC');
			
</script>
                                                        <?php
                                         }
										 
				
				?>
				
				<form name="form1" method="post" id="form1" action="">
                  
                
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                          <?php
						  
					  $max = $db->maxOfAll("id", "items2");
					  $max=$max+1;
					  $itemId="ITEM ".$max."";
					  ?>
					  
                      <td><span class="man">*</span>Item Id:</td>
                      <td><input name="itemId" type="text" id="itemId"  maxlength="200"  class="round default-width-input" readOnly="true" value="<?php echo $itemId; ?>" /></td>
					  <td>Item Name</td>
                      <td><input name="name" placeholder="ENTER ITEM NAME" type="text" id="name" maxlength="200"  class="round default-width-input" value="<?php echo $openingStock; ?>" /></td>
                       
                    
					<td>Opening Stock:</td>
                      <td><input name="openingStock" placeholder="ENTER OPENING STOCK" type="text" id="openingStock" maxlength="200"  class="round default-width-input" value="<?php echo $openingStock; ?>" /></td>
                      
                     
                    </tr>
					<td>&nbsp;</td>
                      <td>&nbsp;</td>
					<tr>
                      <td>Item Supplier:</td>
                      <td><input name="supplier" placeholder="ITEM SUPPLIER" type="text" id="supplier"  maxlength="200"  class="round default-width-input" value="<?php echo $supplier; ?>" /></td>
                    
					<td>Item Receiver:</td>
                      <td><input name="receiver" placeholder="ITEM RECEIVER" type="text" id="receiver"  maxlength="200"  class="round default-width-input" value="<?php echo $receiver; ?>" /></td>
					  
					  <td>Total Usage:</td>
                      <td><input name="usage" placeholder="ENTER TOTAL USAGE" type="text" id="usage"  maxlength="200"  class="round default-width-input" value="<?php echo $usage; ?>" /></td>
					  </tr>
					
					<td>&nbsp;</td>
                      <td>&nbsp;</td>
                    <tr>
                      <td>Transfer:</td>
                      <td><input name="transfer" placeholder="TRANSFER" type="text" id="transfer"  maxlength="200"  class="round default-width-input" value="<?php echo $transfer; ?>" /></td>
                      <!-- 
                      <td>Category:</td>
                      <td><input name="category" placeholder="ENTER CATEGORY NAME" type="text" id="category" maxlength="200"  class="round default-width-input" value="<?php echo $category; ?>" /></td>
										-->
                     
					  <td> closingStock:</td>
                      <td><input name="closingStock" placeholder="CLOSING STOCKED " type="text" id="closingStock" maxlength="200"  class="round default-width-input" value="<?php echo $closingStock; ?>" /></td>
                       
                    </tr>
                   <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    <tr>
                
                      <td>Cost/Unit:</td>
                      <td><input name="unitCost" placeholder="ENTER UNIT COST" type="text" id="unitCost" maxlength="200"  class="round default-width-input" value="<?php echo $unitCost; ?>" /></td>
					  
                      <td>Day Cost:</td>
                      <td><input name="dayCost" placeholder="ENTER UNIT COST" type="text" id="ucost" maxlength="200"  class="round default-width-input" value="<?php echo $dayCost; ?>" /></td>
                       </tr>
					   <tr>
                       <td>Desc:</td>
                       <td><textarea name="description" placeholder="ENTER DESCRIPTION HERE"cols="8" class="round full-width-textarea"><?php echo $description; ?></textarea>
                               
                     <!--<td>Unit &nbsp;</td><td>
                      <select name="unit">
                      <option value="grams">grams</option>
                      <option value="kg">kilograms</option>                      
                      <option value="liters">liters</option>
                      <option value="metres">mitres</option>
                      <option value="kilometers">kilometers</option>
                      <option value="packs">packs</option>
                      <option value="liters">liters</option>
                      <option value="pieces">pieces</option>
                      <option value="pieces">pieces</option>
                      <option value="rolls">rolls</option>
                      <option value="bundles">bundles</option>
                      <option value="cartons">cartons</option>
                      
                      </select>
                      </td>-->
                      <td>
                   
                      
                    </tr>
                   
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    
                    
                    <tr>
                      <td>&nbsp;
					 
					  </td>
                      <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Add">
						(Control + S)
					  
					  <td align="right"><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
                    </tr>
                  </table>
                </form>  
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
		  	
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
        
	<p>Copyright &copy; 2022 GS AGRIC Ltd</p>
	
	</div> <!-- end footer -->

</body>
</html>