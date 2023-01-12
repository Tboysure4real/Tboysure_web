<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Dashboard</title>

    <!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- jQuery & JS files -->
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
</head>

<body>
    <!-- TOP BAR -->
    <?php include_once("tpl/top_bar.php"); ?>
    <!-- end top-bar -->
    <?php include_once("analyticstracking.php") ?>

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

            <!-- end tabs -->
            <!-- Change this image to your own company's logo -->
            <!-- The logo will automatically be resized to 30px height. -->
            <?php $line = $db->queryUniqueObject("SELECT * FROM store_details ");
			$_SESSION['logo'] = $line->log;
			?>
            <a href="#" id="company-branding-small" class="fr"><img src="<?php if (isset($_SESSION['logo'])) {
																				echo "upload/" . $_SESSION['logo'];
																			} else {
																				echo "upload/posnic.png";
																			} ?>" alt="Point of Sale" /></a>

        </div> <!-- end full-width -->

    </div> <!-- end header -->



    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="page-full-width cf">

            <div class="side-menu fl">

                <h3>Quick Links</h3>
                <ul>
                    <!--<li><a href="add_sales.php">Add Sales</a></li>-->
                    <li><a href="chemicalUsageLog.php">Add Chemical Usage Log</a></li>
                    <li><a href="slaughteringLine.php">Add slaughteringLine</a></li>
                    <li><a href="scaleCalibration.php">Add Scale Calibration</a></li>
                    <li><a href="chillerSection.php">Chiller Section</a></li>
                </ul>


            </div> <!-- end side-menu -->

            <div class="side-content fr">

                <div class="content-module">

                    <div class="content-module-heading cf">

                        <h3 class="fl">Statistics</h3>
                        <span class="fr expand-collapse-text">Click to collapse</span>
                        <span class="fr expand-collapse-text initial-expand">Click to expand</span>

                    </div> <!-- end content-module-heading -->

                    <!-- I want to dddisplay Big GS logo at the center
					<img src="upload/Hafiz Super Store.png" class="db_image" width="350px" style="margin-left:600px" />-->
                    <div class="content-module-main cf">


                        <table style="width:350px; float:left;" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="250" align="left">&nbsp;</td>
                                <td width="150" align="left">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left"><strong>Total Number of Chemical Used<strong> </td>
                                <td align="left"><strong><?php echo $count = $db->countOfAll("chemicallog"); ?><strong>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="left"><strong>Total Number of Slaughter record</strong></td>
                                <td align="left">
                                    <strong><?php echo  $count = $db->countOfAll("slaughterline"); ?>&nbsp;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="left"><strong>Total number of Scale Calibration </strong></td>
                                <td align="left">
                                    <strong><?php echo $count = $db->countOfAll("scalecalibration"); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left"><strong>Total Number of Chiller Section record </strong></td>
                                <td align="left">
                                    <strong><?php echo $count = $db->countOfAll("packagingchiller"); ?></strong></td>
                            </tr>
                            <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="left"><strong>Total Number of Quality Control record </strong></td>
                                <td align="left">
                                    <strong><?php echo $count = $db->countOfAll("quality_report"); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                            </tr>
                        </table>


                        <!--<ul class="temporary-button-showcase">
							<li><a href="#" class="button round blue image-right ic-add text-upper">Add</a></li>
							<li><a href="#" class="button round blue image-right ic-edit text-upper">Edit</a></li>
							<li><a href="#" class="button round blue image-right ic-delete text-upper">Delete</a></li>
							<li><a href="#" class="button round blue image-right ic-download text-upper">Download</a></li>
							<li><a href="#" class="button round blue image-right ic-upload text-upper">Upload</a></li>
							<li><a href="#" class="button round blue image-right ic-favorite text-upper">Favorite</a></li>
							<li><a href="#" class="button round blue image-right ic-print text-upper">Print</a></li>
							<li><a href="#" class="button round blue image-right ic-refresh text-upper">Refresh</a></li>
							<li><a href="#" class="button round blue image-right ic-search text-upper">Search</a></li>
						</ul>-->

                    </div> <!-- end content-module-main -->


                </div> <!-- end content-module -->

                <div class="content-module">

                    <div class="content-module-heading cf">

                        <h3 class="fl">Chemical Usage Info</h3>
                        <span class="fr expand-collapse-text">Click to collapse</span>
                        <span class="fr expand-collapse-text initial-expand">Click to expand</span>

                    </div>
                    <div class="content-module-main cf">

                        <table>
                            <form action="" method="post" name="search">
                                &nbsp;&nbsp;
                                &nbsp;&nbsp;
                                &nbsp;&nbsp;

                                <input name="searchtxt" type="text" class="round my_text_box" placeholder="Search"
                                    style="margin-left: 200px">

                                &nbsp;&nbsp;

                                <input name="Search" type="submit" class="my_button round blue   text-upper"
                                    value="Search">
                            </form>



                            <?php
							$SQL = "SELECT * FROM chemicallog";
							if (isset($_POST['Search']) and trim($_POST['searchtxt']) != "") {

								$SQL = "SELECT * FROM  chemicallog WHERE name LIKE '%" . $_POST['searchtxt'] . "%' ";
							}

							$tbl_name = "chemicallog";		//your table name



							$query = "SELECT COUNT(*) as num FROM $tbl_name";

							if (isset($_POST['Search']) and trim($_POST['searchtxt']) != "") {

								$query = "SELECT COUNT(*) as num FROM  chemicallog WHERE ChemName LIKE '%" . $_POST['searchtxt'] . "%'";
							}

							$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
							$total_pages = $total_pages['num'];



							/* Setup vars for query. */

							$targetpage = "dashboard.php"; 	//your file name  (the name of this file)

							$limit = 10; 								//how many items to show per page
							if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
								$limit = $_GET['limit'];
								$_GET['limit'] = 10;
							}

							$page = $_GET['page'];


							if ($page)

								$start = ($page - 1) * $limit; 			//first item to display on this page

							else

								$start = 0;								//if no page var is given, set start to 0
							/* Get data. */

							$sql = "SELECT * FROM chemicallog LIMIT $start, $limit ";
							if (isset($_POST['Search']) and trim($_POST['searchtxt']) != "") {

								$sql = "SELECT * FROM  chemicallog WHERE  chemName LIKE '%" . $_POST['searchtxt'] . "%'  LIMIT $start, $limit";
							}
							$result = mysqli_query($conn, $sql);
							?>
                            <tr>
                                <td>&nbsp;</td>

                                <th>Chemical Name</th>

                                <th>Quantity Used</th>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>

                            <?php
							while ($row = mysqli_fetch_array($result)) {
							?>
                            <tr>
                                <td>&nbsp;</td>


                                <td><?php
										$chemName = $db->queryUniqueValue("SELECT chemName FROM chemicallog");
										echo $chemName;

										?></td>

                                <td> <?php $conc = $db->queryUniqueValue("SELECT conc FROM chemicallog");
											echo $conc; ?></td>

                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php $i++;
							} ?>

                            </form>
                        </table>
                    </div>



                </div> <!-- end full-width -->

            </div>
        </div>
        <div>

        </div>

        <!-- FOOTER -->
        <div id="footer">
            <p>Copyright &copy; 2022 GS AGRIC</p>
            <div id="fb-root">

            </div>

            <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=286371564842269";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            </script>


            <script type="text/javascript">
            (function() {
                var po = document.createElement('script');
                po.type = 'text/javascript';
                po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(po, s);
            })();
            </script>
        </div> <!-- end footer -->

</body>

</html>