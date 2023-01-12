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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        $("#closingStock").autocomplete("closingStock.php", {
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
                    required: "Please Enter transfer Name",
                    minlength: "closingStock Name must consist of at least 3 characters"
                },
                itemId: {
                    required: "Please Enter transfer ID",
                    minlength: "closingStock Name must consist of at least 3 characters"
                },
                sell: {
                    required: "Please Enter Selling Price",
                    minlength: "closingStock Name must consist of at least 3 characters"
                },
                cost: {
                    required: "Please Enter Cost Price",
                    minlength: "closingStock Name must consist of at least 3 characters"
                }
            }
        });

    });

    function numbersonly(e) {
        var unicode = e.charCode ? e.charCode : e.keyCode
        if (unicode != 8 && unicode != 46 && unicode != 37 && unicode != 38 && unicode != 39 && unicode != 40 &&
            unicode != 9) { //if the key isn't the backspace key (which we should allow)
            if (unicode < 48 || unicode > 57)
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
                <li><a href="evisceration.php" class=" transfer-tab">Evisceration</a></li>
                <li><a href="scaleCalibration.php" class="scale-tab">Scale Caliberation</a></li>
                <li><a href="chillerSection.php" class="info-tab">Chiller</a></li>
                <li><a href="packagingSection.php" class="pack-tab">Packaging</a></li>
                <li><a href="gradingBlastFreezer.php" class="cart-tab">Blast Freezer</a></li>
                <li><a href="housekeeping.php" class="cart-tab">Housekeeping</a></li>

            </ul> <!-- end tabs -->

            <!-- Change this image to your own company's logo -->
            <!-- The logo will automatically be resized to 30px height. -->
            <a href="#" id="company-branding-small" class="fr"><img
                    src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>"
                    alt="Point of Sale" /></a>

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
                    $transfer_avail =0;
					//Gump is libarary for Validatoin
					
					if(isset($_POST['name'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(
						'name'    	  => 'required|max_len,100|min_len,3',
						'itemId'     => 'required|max_len,200',
						'openingStock'     	=> 'required|max_len,200',
						'supplier'    => 'required|max_len,200',
						'receiver'     => 'max_len,200',
                        'itemUsage'     => 'max_len,200',
						'transfer'     => 'max_len,200',
                         'closingStock'     => 'max_len,200',
                        'description'     => 'max_len,200'
					)); 
					
					$gump->filter_rules(array(
						'name'    	  => 'trim|sanitize_string|mysqli_escape',
						'itemId'     => 'trim|sanitize_string|mysqli_escape',
						'openingStock'     => 'trim|sanitize_string|mysqli_escape',
						'supplier'     => 'trim|sanitize_string|mysqli_escape',
						'receiver'     => 'trim|sanitize_string|mysqli_escape',
						'itemUsage'     => 'trim|sanitize_string|mysqli_escape',
                         'transfer'     => 'trim|sanitize_string|mysqli_escape',
                        'closingStock'     => 'trim|sanitize_string|mysqli_escape',
                        'description' => 'trim|sanitize_string|mysqli_escape'
					));
				
					$validated_data = $gump->run($_POST);
                    $itemId		= "";
					$name   = "";
					$openingStock 	= "";
					$supplier      = "";
					$receiver    	= "";
					$itemUsage 	= "";
					$closingStock 	= "";
                    $transfer =      "";
                    $description   = "";
			

					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
						
						
							$itemId=($_POST['itemId']);
							$name=($_POST['name']);
							$category=($_POST['category']);
							$openingStock=($_POST['openingStock']);
							$receiver=($_POST['receiver']);
							$itemUsage=($_POST['itemUsage']);
							$closingStock=($_POST['closingStock']);
                            $supplier=($_POST['supplier']);
                            $transfer=($_POST['transfer']);
							$category=($_POST['category']);
                            $description=($_POST['description']);
                            $itemUsage=($_POST['itemUsage']);
							$unitCost=($_POST['unitCost']);
							$dayCost=($_POST['dayCost']);
						
						$count = $db->countOf("items", "name ='$name'");
		if($count>=1)
			{
	        $data='Dublicat Entry. Please Verify';
            $msg='<p style=color:red;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>

                        <script src="dist/js/jquery.ui.draggable.js"></script>
                        <script src="dist/js/jquery.alerts.js"></script>
                        <script src="dist/js/jquery.js"></script>
                        <link rel="stylesheet" href="dist/js/jquery.alerts.css">

                        <script type="text/javascript">
                        jAlert('<?php echo  $msg; ?>', 'GS AGRIC');
                        </script>
                        <?php
			}
			else
			{
                
                //$transfer_avail = (int) $transfer - (int) $supplier;

                $dayCost = (double)$unitCost * (double)$itemUsage;
				$closingStock = (double)$openingStock - (double)$itemUsage;

				if(isset($_POST['itemId'])){
				$db->query("insert into items(itemId,name,openingStock,supplier,receiver,itemUsage,transfer,closingStock,unitCost,dayCost,description)
				values('$itemId','$name','$openingStock','$supplier','$receiver','$itemUsage','$transfer','$closingStock','$unitCost','$dayCost','$description')");
                
                    //$db->query("insert into item_closingStock values(NULL,'$name','$address')");
				
				 $msg=" $name Added" ;
				header("Location: Items.php?msg=$msg");
				
                        }else
			echo "<br><font color=red size=+1 >Problem in Adding !</font>" ;
			
					}
					
			}
			
			
			}
				
							
						
				if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>

                        <script src="dist/js/jquery.ui.draggable.js"></script>
                        <script src="dist/js/jquery.alerts.js"></script>
                        <script src="dist/js/jquery.js"></script>
                        <link rel="stylesheet" href="dist/js/jquery.alerts.css">

                        <script type="text/javascript">
                        jAlert('<?php echo  $msg; ?>', 'GS AGRIC');
                        </script>
                        <?php
                                         }
										 
				
				?>

                        <form name="form1" method="post" id="form1" action="">


                            <table class="form" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <?php
						  
					  $max = $db->maxOfAll("id", "items");
					  $max=$max+1;
					  $itemId="ITEM ".$max."";
					  ?>

                                    <td><span class="man">*</span>Item Id:</td>
                                    <td><input name="itemId" type="text" id="itemId" maxlength="200"
                                            class="round default-width-input" readOnly="true"
                                            value="<?php echo $itemId; ?>" /></td>

                                    <td><span class="man"></span>Item Name:</td>
                                    <td><input name="name" placeholder="ENTER CHEMICAL NAME" type="text" id="name"
                                            maxlength="200" class="round default-width-input"
                                            value="<?php echo $name;?>" /></td>


                                    <td>Opening Stock:</td>
                                    <td><input name="openingStock" placeholder="ENTER OPENING STOCK" type="text"
                                            id="openingStock" maxlength="200" class="round default-width-input"
                                            value="<?php echo $openingStock; ?>" /></td>
                                </tr>


                                <tr>

                                <tr>
                                    <td>Item Supplier :</td>
                                    <td><input name="supplier" placeholder="ENTER QUANTITY GIVEN" type="text"
                                            id="supplier" maxlength="200" class="round default-width-input"
                                            value="<?php echo $openingtransfer; ?>" /></td>

                                    <td>Item receiver:</td>
                                    <td><input name="receiver" placeholder="ENTER SUPPLIER NAME" type="text"
                                            id="receiver" maxlength="200" class="round default-width-input"
                                            value="<?php echo $receiver; ?>" /></td>

                                    <td>Item Used:</td>
                                    <td><input name="itemUsage" placeholder="ENTER TOTAL ITEM USAGE" type="text"
                                            id="itemUsage" maxlength="200" class="round default-width-input"
                                            value="<?php echo $closingStock; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>transfer:</td>
                                    <td><input name="transfer" placeholder="QUANTITY TRANSFERED " type="text"
                                            id="quantity" maxlength="200" class="round default-width-input"
                                            value="<?php echo $transfer; ?>" /></td>
                                    <td>Item Category &nbsp;</td>
                                    <td>
                                        <select name="category">
                                            <option value="Fuel">Fuel $ Service Part</option>
                                            <option value="Packaging">Packaging Nylon $ Sack</option>
                                            <option value="Consumable">Consumable</option>
                                            <option value="Hardware">Hardware</option>
                                            <option value="Tagging">Tagging Materials</option>
                                            <option value="Chemicals">Chemicals</option>
                                            <option value="Cleaaning">Cleaaning Materials</option>
                                            <option value="Uniforms">Uniforms</option>
                                        </select>
                                    </td>
                                    <!--<td>Item Category:</td>
                      <td><input name="category" placeholder="QUANTITY transferED " type="option" id="category" maxlength="200"  class="round default-width-input" value="<?php echo $transfer; ?>" /></td>
										-->
                                    <td>closingStock:</td>
                                    <td><input name="closingStock" placeholder="ENTER closingStock NAME" type="text"
                                            id="closingStock" maxlength="200" class="round default-width-input"
                                            readonly="true" value="<?php echo $closingStock; ?>" /></td>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>
                                    <td>Cost Unit:</td>
                                    <td><input name="unitCost" placeholder="ENTER QUANTITY GIVEN" type="text"
                                            id="unitCost" maxlength="200" class="round default-width-input"
                                            value="<?php echo $openingtransfer; ?>" /></td>

                                    <td>Day COST:</td>
                                    <td><input name="dayCost" placeholder="ENTER SUPPLIER NAME" type="text" id="dayCost"
                                            maxlength="200" class="round default-width-input" readonly="true"
                                            value="<?php echo $receiver; ?>" /></td>
                                <tr>
                                    <td>&nbsp; </td>
                                    <td>&nbsp; </td>
                                </tr>
                                <tr>

                                    <td>Desc:</td>
                                    <td><textarea name="description" placeholder="ENTER DESCRIPTION HERE" cols="8"
                                            class="round full-width-textarea"><?php echo $description; ?></textarea>
                                </tr>


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
                                            <input class="button round blue image-right ic-add text-upper" type="submit"
                                                name="Submit" value="Add">
                                            (Control + S)

                                        <td align="right"><input class="button round red   text-upper" type="reset"
                                                name="Reset" value="Reset"> </td>
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