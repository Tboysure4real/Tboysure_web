<?php
include_once("init.php");
	
if(isset($_POST['qcId'])){
    $_POST = $gump->sanitize($_POST);
    $gump->validation_rules(array(
        'observation'    	  => 'required|max_len,100|min_len,3',
        'qcId'     => 'required|max_len,200',
        'certificate'     	=> 'required|max_len,200',
        'numberWeight'    => 'required|max_len,200',
        'stunningVoltage'     => 'max_len,200',
        'bleedingTime'     => 'max_len,200',
        'scaldingTemp'     => 'max_len,200',
         'gradedTemp'     => 'max_len,200',
        'calibration'     => 'max_len,200'
    )); 
    
    $gump->filter_rules(array(
        'observation'    	  => 'trim|sanitize_string|mysqli_escape',
        'qcId'     => 'trim|sanitize_string|mysqli_escape',
        'certificate'     => 'trim|sanitize_string|mysqli_escape',
        'numberWeight'     => 'trim|sanitize_string|mysqli_escape',
        'stunningVoltage'     => 'trim|sanitize_string|mysqli_escape',
        'bleedingTime'     => 'trim|sanitize_string|mysqli_escape',
         'scaldingTemp'     => 'trim|sanitize_string|mysqli_escape',
        'gradedTemp'     => 'trim|sanitize_string|mysqli_escape',
        'calibration' => 'trim|sanitize_string|mysqli_escape'
    ));

			
    $validated_data = $gump->run($_POST);
    $qcId		= "";
    $observation   = "";
    $certificate 	= "";
    $numberWeight      = "";
    $stunningVoltage    	= "";
    $bleedingTime 	= "";
    $gradedTemp 	= "";
    $scaldingTemp =      "";
    $calibration   = "";


    if($validated_data === false) {
            echo $gump->get_readable_errors(true);
    } else {
        
        
            $qcId=($_POST['qcId']);
            $date=($_POST['date']);
            $observation=($_POST['observation']);
            $birdsCondition=($_POST['birdsCondition']);
            $certificate=($_POST['certificate']);
            $numberWeight=($_POST['numberWeight']);
            $birdsTemp=($_POST['birdsTemp']);
            $stunningVoltage=($_POST['stunningVoltage']);
            $bleedingTime=($_POST['bleedingTime']);
            $gradedTemp=($_POST['gradedTemp']);
            $numberWeight=($_POST['numberWeight']);
            $scaldingTemp=($_POST['scaldingTemp']);
            
            $calibration=($_POST['calibration']);
            $bleedingTime=($_POST['bleedingTime']);
            
            $carcassAppear=($_POST['carcassAppear']);
            $dosage=($_POST['dosage']);
            $mortality=($_POST['mortality']);
            $product=($_POST['product']);

        //$count = $db->countOf("quality_report", "numberWeight ='$numberWeight'");

       $date=strtotime( $date );
        $mysqldate = date('d-m-Y',$date);
            if(isset($_POST['qcId'])){
            $db->query("insert into quality_report(qcId,mysqldate,observation,birdsCondition,certificate,numberWeight,stunningVoltage,bleedingTime,scaldingTemp,carcassAppear,gradedTemp,calibration,birdsTemp,dosage,mortality,product)
            values('$qcId','$mysqldate','$observation','$birdsCondition','$certificate','$numberWeight','$stunningVoltage','$bleedingTime','$scaldingTemp','$carcassAppear','$gradedTemp','$calibration','$birdsTemp','$dosage','$mortality','$product')");
            
                //$db->query("insert into item_gradedTemp values(NULL,'$name','$address')");
            
             $msg=" Quality Control Record is Added" ;
            header("Location: add_quality_report.php?msg=$msg");
            
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
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quality Assurance</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <script>
    
    
    
    
function purchase_report_pdf_fn() 
{ 
 window.open("purchase_pdf_report.php?stockid="+$('#stockid').val()+"&date="+$('#date').val()+"&bill_no="+$('#bill_no').val()
 +"&numberWeight="+$('#numberWeight').val()	+"&address="+$('#address').val()	+"&contact1="+$('#contact1').val()
 +"&item="+$('#stock_name[]').val()	 +"&quty="+$('#quty[]').val()	+"&cost="+$('#cost[]').val()	+"&sell="+$('#sell[]').val()
 +"&total="+$('#jibi[]').val()		+"&payment="+$('#payment').val()
 	+"&balance="+$('#balance').val()	+"&grand_total="+$('#grand_total').val()
 +"&duedate="+$('#duedate').val()	 	+"&calibration="+$('#calibration').val(),

 "myNewWinsr","width=500,height=500,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
}
    
    
    </script>

    
    
    
    
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 
        <script type="text/javascript">
$(function() {
    document.getElementById('bill_no').focus();
    	$("#numberWeight").autocomplete("numberWeight1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
    	$("#item").autocomplete("stock_purchse.php", {
		width: 160,
		autoFill: true,
		mustMatch: true,
		selectFirst: true
	});
        $("#item").blur(function()
			{
                          document.getElementById('total').value=document.getElementById('cost').value * document.getElementById('quty').value 
                        });
        $("#item").blur(function()
			{
			 
						
			 $.post('check_item_details.php', {name1: $(this).val() },
				function(data){
					$("#cost").val(data.cost);
								$("#sell").val(data.sell);
								$("#stock").val(data.stock);
								$('#guid').val(data.guid);
								if(data.cost!=undefined)
								$("#0").focus();
								
								
							}, 'json');
											
					

			
			});
        $("#quty").blur(function()
			{
                        if(document.getElementById('item').value==""){
                            document.getElementById('item').focus();
                        }
                        });
        $("#numberWeight").blur(function()
			{
			 
							
			 $.post('check_numberWeight_details.php', {name1: $(this).val() },
				function(data){
				
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								
								if(data.address!=undefined)
								$("#0").focus();
								
							}, 'json');
											
					

			
			});

            $("#carcassAppear").blur(function)
            {
                $.post()
                
                if(document.getElementById('unitCost').value!="" && document.getElementById('bleedingTime').value!=""){
                document.getElementById('carcassAppear').value=parseFloat(document.getElementById('unitCost').value * parseFloat(document.getElementById('bleedingTime').value));
 
            }

 $('#test1').jdPicker();
 $('#test2').jdPicker();
		


		var hauteur=0;
		$('.code').each(function(){
			if($(this).height()>hauteur) hauteur = $(this).height();
		});

		$('.code').each(function(){ $(this).height(hauteur); });
	});

        </script>
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
	if(document.getElementById('item')===""){
            document.getElementById('item').focus();
        }
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				bill_no: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				stockid: {
					required: true					
				},				
				grand_total: {
					required: true					
				},				
				payment: {
					required: true					
				},				
				numberWeight: {
					required: true,					
				}
			},
			messages: {
				numberWeight: {
					required: "Please Enter numberWeight"					
				},
				stockid: {
					required: "Please Enter Stock ID"
				},
				grand_total: {
					required: "Add Stock Items"
				},
				payment: {
					required: "Enter Payment"
				},
				bill_no: {
					required: "Please Enter Bill Number",
                                        minlength: "Bill Number must consist of at least 3 characters"
				}
			}
		});
	
	});
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=27 && unicode!=38 && unicode!=39 && unicode!=40 && unicode!=9){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }

  
	
	</script>
        <script type="text/javascript">
           function remove_row(o) {
    var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
           }
     function add_values(){
         if(unique_check()){
    
         if(document.getElementById('edit_guid').value==""){
     if(document.getElementById('item').value!="" && document.getElementById('quty').value!="" && document.getElementById('cost').value!="" && document.getElementById('total').value!=""){
     code=document.getElementById('item').value;
  
    quty=document.getElementById('quty').value;
    cost=document.getElementById('cost').value;
    sell=document.getElementById('sell').value;
    disc=document.getElementById('stock').value;
    total=document.getElementById('total').value;
    item=document.getElementById('guid').value;
    main_total=document.getElementById('posnic_total').value;
    roll=parseInt(document.getElementById('roll_no').value);
 
    $('<tr id='+item+'><td><lable id='+item+'roll class=jibi007 >'+roll+'</label></td><td><input type=hidden readonly=readonly value='+item+' id='+item+'id ><input type=text name="name[]"  id='+item+'st style="width: 150px" class="round  my_with" ></td><td><input type=text name=quty[] readonly="readonly" value='+quty+' id='+item+'q class="round  my_with" style="text-align:right;" ></td><td><input type=text name=cost[] readonly="readonly" value='+cost+' id='+item+'c class="round  my_with" style="text-align:right;"></td><td><input type=text name=sell[] readonly="readonly" value='+sell+' id='+item+'s class="round  my_with" style="text-align:right;"  ></td><td><input type=text name=stock[] readonly="readonly" value='+disc+' id='+item+'p class="round  my_with" style="text-align:right;" ></td><td><input type=text name=jibi[] readonly="readonly" value='+total+' id='+item+'to class="round  my_with" style="width: 120px;margin-left:20px;text-align:right;" ><input type=hidden name=total[] id='+item+'my_tot value='+main_total+'> </td><td><input type=button value="" id='+item+' style="width:30px;border:none;height:30px;background:url(images/edit_new.png)" class="round" onclick="edit_stock_details(this.id)"  ></td><td><input type=button value="" id='+item+' style="width:30px;border:none;height:30px;background:url(images/close_new.png)" class="round" onclick=reduce_balance("'+item+'");$(this).closest("tr").remove(); ></td></tr>').fadeIn("slow").appendTo('#item_copy_final');
    document.getElementById('quty').value="";
    document.getElementById('cost').value="";
    document.getElementById('roll_no').value=roll+1;
    document.getElementById('sell').value="";
    document.getElementById('stock').value="";
    document.getElementById('total').value="";
    document.getElementById('item').value="";
    document.getElementById('guid').value="";
    if(document.getElementById('grand_total').value==""){
        document.getElementById('grand_total').value=main_total;
    }else{
    document.getElementById('grand_total').value=parseFloat(document.getElementById('grand_total').value)+parseFloat(main_total);
    }
     document.getElementById('main_grand_total').value=parseFloat(document.getElementById('grand_total').value);
    document.getElementById(item+'st').value=code;
    document.getElementById(item+'to').value=total;
     document.getElementById('item').focus();

}else{
     alert('Please Select An Item');
    }
    }else{
    id=document.getElementById('edit_guid').value;
    document.getElementById(id+'st').value=document.getElementById('item').value;  
    document.getElementById(id+'q').value=document.getElementById('quty').value;
    document.getElementById(id+'c').value=document.getElementById('cost').value;
    document.getElementById(id+'s').value=document.getElementById('sell').value;
    document.getElementById(id+'p').value=document.getElementById('stock').value;
    document.getElementById('grand_total').value=parseFloat(document.getElementById('grand_total').value)+parseFloat(document.getElementById('posnic_total').value)-parseFloat(document.getElementById(id+'my_tot').value);
    document.getElementById('main_grand_total').value=parseFloat(document.getElementById('grand_total').value);
    document.getElementById(id+'to').value=document.getElementById('total').value;
    document.getElementById(id+'id').value=id;

    document.getElementById(id+'my_tot').value=document.getElementById('posnic_total').value;
    document.getElementById('quty').value="";
    document.getElementById('cost').value="";
    document.getElementById('sell').value="";
    document.getElementById('stock').value="";
    document.getElementById('total').value="";
    document.getElementById('item').value="";
    document.getElementById('guid').value="";
    document.getElementById('edit_guid').value="";
    document.getElementById('item').focus();
    }
    }
 
    }
    function reduce_balance(id){
 var minus=parseFloat(document.getElementById(id+"my_tot").value);
  document.getElementById('grand_total').value=parseFloat(document.getElementById('grand_total').value)-minus;
  document.getElementById('main_grand_total').value=parseFloat(document.getElementById('grand_total').value);
//var count=parseInt(document.getElementById('roll_no').value)
var status=1;
var elements = document.getElementsByClassName('jibi007');
var j=1;
var my_id=id+'roll';
for (var i = 0; i < elements.length; i++) {
    elements[0].value=1;
   if(parseFloat(document.getElementById(my_id).innerHTML)==i){
     elements[i].innerHTML =parseFloat(elements[i-1].innerHTML)
   }else{
       if(i!=0){
         elements[i].innerHTML =parseFloat(elements[i-1].innerHTML)+1;
        j++;
       }
   }
     document.getElementById('roll_no').value=elements.length;
}
   //console.log(id);
}
    function total_amount(){
    balance_amount();
               
        document.getElementById('total').value=document.getElementById('cost').value * document.getElementById('quty').value
    document.getElementById('posnic_total').value=document.getElementById('total').value;
        document.getElementById('total').value =  parseFloat(document.getElementById('total').value);
   if(document.getElementById('item').value===""){
       document.getElementById('item').focus();
   }
    }
   function edit_stock_details(id) {
     document.getElementById('item').value=document.getElementById(id+'st').value;
     document.getElementById('quty').value=document.getElementById(id+'q').value;
    document.getElementById('cost').value=document.getElementById(id+'c').value;
    document.getElementById('sell').value=document.getElementById(id+'s').value;
    document.getElementById('stock').value=document.getElementById(id+'p').value;
    document.getElementById('total').value=document.getElementById(id+'to').value;
   
    document.getElementById('guid').value=id;
    document.getElementById('edit_guid').value=id;
     
   }
   function unique_check(){
      if(!document.getElementById(document.getElementById('guid').value) || document.getElementById('edit_guid').value==document.getElementById('guid').value){
            return true;
           
        }else{
           
            alert("This Item is already added In This Purchase");
            document.getElementById('item').focus();
             document.getElementById('quty').value="";
                document.getElementById('cost').value="";
                document.getElementById('sell').value="";
                document.getElementById('stock').value="";
                document.getElementById('total').value="";
                document.getElementById('item').value="";
                document.getElementById('guid').value="";
                document.getElementById('edit_guid').value="";
                return false;
   }
   }
   function quantity_chnage(e){
       if(document.getElementById('item').value==""){
           document.getElementById('item').focus();
       }
           
         var unicode=e.charCode? e.charCode : e.keyCode
                if (unicode!=13 && unicode!=9){
        }
       else{
           add_values();
          
            document.getElementById("item").focus();
           
        }
         if (unicode!=27){
        }
       else{
               
             document.getElementById("item").focus();
        }
        
   }
   
    function formatCurrency(fieldObj)
{
    if (isNaN(fieldObj.value)) { return false; }
    fieldObj.value = '$ ' + parseFloat(fieldObj.value).toFixed(2);
    return true;
}
function balance_amount(){
    if(document.getElementById('grand_total').value!="" && document.getElementById('payment').value!=""){
    data=parseFloat(document.getElementById('grand_total').value);
    document.getElementById('balance').value=data-parseFloat(document.getElementById('payment').value);
        if(parseFloat(document.getElementById('grand_total').value) >= parseFloat(document.getElementById('payment').value)){
       
    }else{
        if(document.getElementById('grand_total').value!=""){
         document.getElementById('balance').value='000.00';
         document.getElementById('payment').value=parseFloat(document.getElementById('grand_total').value);
        }else{
            document.getElementById('balance').value='000.00';
         document.getElementById('payment').value="";
        }
    }
    }else{
        document.getElementById('balance').value="";
    }

    
}
function carcassAppear(){
if(document.getElementById('unitCost').value!="" && document.getElementById('bleedingTime').value!=""){
    document.getElementById('carcassAppear').value=parseFloat(document.getElementById('unitCost').value * parseFloat(document.getElementById('bleedingTime').value));
  }else{
    document.getElementById('carcassAppear').value="";
}

}
        </script>

</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<?php include_once("dist/bootstrap.php"); ?>
	<!-- end top-bar -->
	
	
	
	

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
				<!--<li><a href="slaugheringLine.php" class=" Slughtering Line-tab">numberWeight</a></li>-->
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
				
            <h3>Quality Assurance</h3>
				<ul>
					<li><a href="add_quality_report.php">Add Quality Record</a></li>
					<li><a href="view_quality_report.php">View Quality Record</a></li>
                    <li><a href="print_quality_report.php">Print Quality Report</a></li>

				</ul>
				                                                                
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
                    <h3 class="fl">Quantity Assurance Report</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
						<div class="content-module-main cf">
				
							
					<?php
					//Gump is libarary for Validatoin
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
                                    <input type="hidden" id="posnic_total" >
                                    <input type="hidden" id="roll_no" value="1" >
            <div class="mytable_row ">
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                               <?php
					  $max = $db->maxOfAll("id", "quality_report");
					  $max=$max+1;
					  $autoid="QA ".$max."";
					  
					  ?>
					  
                     <tr><td>QA ID:</td>
                     
                      <td><input name="qcId" type="text" id="qcId"  maxlength="200"  class="round default-width-input" readOnly="true" value="<?php echo $autoid; ?>" style="width:130px"/></td>
                   
                      <td>Date:</td>
                      <td><input  name="date" placeholder="" value="<?php echo date('d-m-Y');?>" type="text" id="name" maxlength="200"  class="round default-width-input"  style="width:130px"/></td>
                      </tr>
                      <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                       </tr>
                                  <tr>
                        
                      <td><span class="man"></span>QA OBSERVATION/</br>CORRECTIVE ACTION:</td>
                      <td><input name="observation" placeholder="OBSERVATION OR CORRECTIVE ACTION" type="text" id="observation"  maxlength="200"  class="round default-width-input"  /></td>
                     
                      <td><span class="man">*</span>Birds Condition @ Arrival:</td>
                      <td><input name="birdsCondition"type="text" id="birdsCondition" maxlength="200"  class="round default-width-input"  style="width:270px" value="<?php echo"Healthy"; ?>" /></td>
                     
                    </tr>
                    
                    <tr>
                         <td>Health Certificate Issued? </td>
                      <td><input name="certificate" placeholder="YES/NO" type="text" id="certificate" maxlength="200"  class="round default-width-input" 
					  value="<?php echo $certificate; ?>" /></td>
                        
                        <td>Total Number of Birds $ weight:</td>
                      <td><input name="numberWeight" placeholder="Number of Birds $ weight"type="text" id="numberWeight" maxlength="200"   class="round default-width-input" 
					  value="<?php echo $numberWeight; ?>" /></td>
                        <tr>
                         
                      <tr> <td>Stunning Voltage:</td>
                      <td><input name="stunningVoltage" type="text" id="stunningVoltage" maxlength="200"   class="round default-width-input" 
					  value="<?php echo "100v."; ?>" /></td>
                      
                      <td>Bleeding Time</td>
                      <td><input name="bleedingTime" type="text" id="bleedingTime" maxlength="200" class="round default-width-input" 
					  value="<?php echo "90sec."; ?>" /></td>
                                        </tr>
                    <tr>
                        <td>Scalding Temperature:</td>
                      <td><input name="scaldingTemp" type="text" id="scaldingTemp" maxlength="200"  class="round default-width-input" 
					  value="<?php echo"60.0⁰c"; ?>" /></td>

                      <td>Carcass Apperance/</br>Visceral Seperation:</td>
                      <td><input name="carcassAppear" type="text" id="carcassAppear" maxlength="200"class="round default-width-input" 
					  value="<?php echo $carcassAppear; ?>" /></td>
                                        </tr>
                      <tr>
                      <td>Temperature of The</br>Graded Product :</td>
                      <td><input name="gradedTemp" type="text" id="gradedTemp" maxlength="200"  class="round default-width-input" 
					  value="<?php echo $gradedTemp; ?>" /></td>

                      <td>Scale Calibration</td>
                      <td><input name="calibration" type="text" id="gradedTemp" maxlength="200"  class="round default-width-input" 
                      value="<?php echo $calibration; ?>" /></td>
                      </tr>
                     <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                      <tr>
                     <td>Exit Bird's Temperature':</td>
                      <td><input name="birdsTemp" type="text" id="birdsTemp" maxlength="200"  class="round default-width-input" 
					  value="<?php echo "4.0⁰c"; ?>" /></td>
                      <td>Chlorine dosage</td>
                      <td><input name="dosage" type="text" id="gradedTemp" maxlength="200"  class="round default-width-input" value="<?php echo "20-30ppm";?>" />
                     </tr>
                     <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                     </tr><tr>
                      <td>Mortality</td>
                      <td><input type="text" name="mortality" placeholder="No of Mortality"cols="15" class="round round default-width-input" /><?php echo $mortality; ?></td>
                      <td>Product Produce:</td>
                      <td><input name="product" type="text" id="product" maxlength="200" class="round" style="width:260px"
					  value="<?php echo "Whole chicken and chicken parts , cut 4 and 9cut"; ?>" /></td>

                     </tr>
                   
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      </tr>
                      </table>
                
                      <table class="form">
                    <tr>
                     <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Add" >
                     </td><td>			(Control + S)
                     <input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
                     <td>&nbsp; </td> <td>&nbsp; </td>
                    </tr>
                </table>
               </div>
                               
	</form>
					</div> <!-- end content-module-main -->
							
                </div>
				</div> <!-- end content-module -->
				
				 
		
	</div> <!-- end content -->
	

	<!-- FOOTER -->
	<div id="footer">
		<p> &copy;Copyright 2022 GS AGRIC</p>

	
	</div> <!-- end footer -->

</body>
</html>