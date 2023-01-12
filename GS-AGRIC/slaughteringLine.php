<?php
include_once("init.php");
	if(isset($_POST['slauId'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(

						'slauId' => 'required|max_len,100|min_len,3',                      
                        'stunner' => 'required|max_len,100|min_len,3',
                        'bleedingTrough' => 'required|max_len,100|min_len,3',
                        'rollerConveyor'      =>    'required|max_len,100|min_len,3',
                        'shackleWasher'     =>  'required|max_len,100|min_len,3',
                        'scalder'    =>  'required|max_len,100|min_len,3',
                        'defeateringMachine'           =>  'required|max_len,100|min_len,3',
                        'headPuller'           =>  'required|max_len,100|min_len,3',
                        'killingLineConveyor'                 =>  'required|max_len,100|min_len,3',
                        'shackles'                 => 'required|max_len,100|min_len,3',
                        'feetUnloader'                 => 'required|max_len,100|min_len,3',
                        'hockCutter'                 => 'required|max_len,100|min_len,3',
                        'remark'                 => 'required|max_len,100|min_len,3'
					));
				
					$gump->filter_rules(array(
                    'slauId'     => 'trim|sanitize_string|mysqli_escape',
                    'stunner'         => 'trim|sanitize_string|mysqli_escape',
                   'bleedingTrough'        => 'trim|sanitize_string|mysqli_escape',
                   'rollerConveyor'     => 'trim|sanitize_string|mysqli_escape',
                   'shackleWasher'     => 'trim|sanitize_string|mysqli_escape',
                   'scalder'            => 'trim|sanitize_string|mysqli_escape',
                   'defeateringMachine'                  => 'trim|sanitize_string|mysqli_escape',
                   'headPuller'                => 'trim|sanitize_string|mysqli_escape',
                   'killingLineConveyor'                => 'trim|sanitize_string|mysqli_escape', 
                   'shackles'           => 'trim|sanitize_string|mysqli_escape',
                   'feetUnloader'                => 'trim|sanitize_string|mysqli_escape',    
                   'hockCutter'             => 'trim|sanitize_string|mysqli_escape',
                   'remark'             => 'trim|sanitize_string|mysqli_escape'
                ));

					//$validated_data = $gump->run($_POST);
                    $slauId   = "";
					$stunner 	= "";
					$bleedingTrough    = "";
					$rollerConveyor 	= "";
                    $shackleWasher  = "";  
                    $scalder  = ""; 
                    $defeatheringMachine = "";
                    $headPuller  = "";    
                    $killingLine = "";
                    $shackles  = "";         
                    $feetUnloader   = "";         
                    $hockCutter   = "";     
                    $remark   = "";    
                    

					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
                                            $username = $_SESSION['username'];
                        
                            $slauId=($_POST['slauId']); 
                            $date=($_POST['date']);                
							$stunner=($_POST['stunner']);
							$bleedingTrough=$_POST['bleedingTrough'];
                            $rollerConveyor=($_POST['rollerConveyor']);
							$shackleWasher=($_POST['shackleWasher']);
							$scalder=($_POST['scalder']);
							$defeatheringMachine=($_POST['defeatheringMachine']);
							$headPuller=($_POST['headPuller']);
                            $killingLine=($_POST['killingLine']);
                            $shackles=($_POST['shackles']);
							$feetUnloader=($_POST['feetUnloader']);
							$hockCutter=($_POST['hockCutter']);
                            $remark=($_POST['remark']);
							
	       //$count = $db->countOf("purchase", "name='$stock_name'");
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
             
        }else{

            $date=strtotime( $date );
            $mysqldate = date('d-m-Y',$date);
        
        if(isset($_POST['slauId'])){
			$db->query("insert into slaughterline(slauId,mysqldate,stunner,bleedingTrough,rollerConveyor,shackleWasher,scalder,defeatheringMachine,headPuller,killingLine,shackles,feetUnloader,hockCutter,remark) 
            values('$slauId','$mysqldate','$stunner','$bleedingTrough','$rollerConveyor','$shackleWasher','$scalder','$defeatheringMachine','$headPuller','$killingLine','$shackles','$feetUnloader','$hockCutter','$remark')"); 
		
                        $msg="Slaughtering Line Added successfully Ref: ". $_POST['slauId']."" ;
				header("Location: slaughteringLine.php?msg=$msg");
            }
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
	<title> Slaughtering Line Page</title>
	
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
 +"&supplier="+$('#supplier').val()	+"&address="+$('#address').val()	+"&contact1="+$('#contact1').val()
 +"&item="+$('#stock_name[]').val()	 +"&quty="+$('#quty[]').val()	+"&cost="+$('#cost[]').val()	+"&sell="+$('#sell[]').val()
 +"&total="+$('#jibi[]').val()		+"&payment="+$('#payment').val()
 	+"&balance="+$('#balance').val()	+"&grand_total="+$('#grand_total').val()
 +"&duedate="+$('#duedate').val()	 	+"&description="+$('#description').val(),

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
    	$("#supplier").autocomplete("supplier1.php", {
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
        $("#supplier").blur(function()
			{
			 
							
			 $.post('check_supplier_details.php', {name1: $(this).val() },
				function(data){
				
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								
								if(data.address!=undefined)
								$("#0").focus();
								
							}, 'json');
											
					

			
			});
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
				supplier: {
					required: true,					
				}
			},
			messages: {
				supplier: {
					required: "Please Enter Supplier"					
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
				
				<h3>Slaughtering Line Management</h3>
				<ul>
					<li><a href="slaughteringLine.php">Add Slaughtering Line Page</a></li>
					<li><a href="view_slaughteringLine.php">View Slaughtering Line Section </a></li>
                    <li><a href="print_slaughter_report1.php">Print Slaughter Report </a></li>

				</ul>
				                                                                
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Slaughter or Kiling Line Section</h3>
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
					  $max = $db->maxOfAll("id", "slaughterline");
					  $max=$max+1;
					  $autoid="Slau ".$max."";
					  
					  ?>
					  
                      <td>Slau ID:</td>
                      <!--<td><input name="stockid" type="text" id="stockid" maxlength="200"  class="round default-width-input" style="width:130px" readOnly="true" value="<?php echo $autoid ?>" /></td>
                                        -->
                      <td><input name="slauId" type="text" id="slauId"  maxlength="200"  class="round default-width-input" readOnly="true" value="<?php echo $autoid; ?>" /></td>
                       
                      <td>Date:</td>
                      <td><input  name="date" placeholder="" value="<?php echo date('d-m-Y');?>" type="text" id="name" maxlength="200"  class="round default-width-input"  /></td>
                    </tr>
                    <tr>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      </tr>
                    <tr>
                      <td>&nbsp; </td><td><label for="washed" style="right:300px; color:yellow">Clean</label></td>
                        <td><label for="washed" style="right:300px; color:red">Not Clean</label></td>
                      </tr>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                 
                       <tr>
                      <td>Stunner:</td>
                      <td><input name="stunner" placeholder="" type="checkbox" id="stunner" value="Clean" maxlength="200"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="stunner" placeholder="" type="checkbox" id="stunner" value="Not Clean" maxlength="200"  class="round default-width-input" style="width:120px " /></td>
                      </tr>
                      <tr>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                       </tr>
                      
                       <tr>
                      <td>Bleeding Trough:</td>
                      <td><input name="bleedingTrough" placeholder="" type="checkbox" id="bleedingTrough" value="Clean" maxlength="200"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="bleedingTrough" placeholder="" type="checkbox" id="bleedingTrough" value="Not Clean" maxlength="200"  class="round default-width-input" style="width:120px " /></td>
                      </tr>
                      <tr>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                       </tr>
                      
                      <tr>
                      <td>roller Conveyor:</td>
                      <td><input name="rollerConveyor" placeholder="" type="checkbox" id="rollerConveyor" value="Clean" maxlength="200"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="rollerConveyor" placeholder="" type="checkbox" id="rollerConveyor" value="Not Clean" maxlength="200"  class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      
                      <tr>
                     <td>Shackle Washer:</td>
                      <td><input name="shackleWasher" placeholder="" type="checkbox" id="shackleWasher" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="shackleWasher" placeholder="" type="checkbox" id="shackleWasher" maxlength="200"  value="Not Clean" class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                      <tr>
                     <td>Scalder:</td>
                      <td><input name="scalder" placeholder="" type="checkbox" id="scalder" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="scalder" placeholder="" type="checkbox" id="scalder" maxlength="200"  value="Not Clean" class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                       <tr>
                     <td>Defeathering Machine:</td>
                      <td><input name="defeatheringMachine" placeholder="" type="checkbox" id="defeatheringMachine" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="defeatheringMachine" placeholder="" type="checkbox" id="defeatheringMachine" maxlength="200"  value="Not Clean" class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                      <tr>
                     <td>Head Puller:</td>
                      <td><input name="headPuller" placeholder="" type="checkbox" id="headPuller" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="headPuller" placeholder="" type="checkbox" id="headPuller" maxlength="200"  value="Not Clean" class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                        <tr>
                     <td>Killing Line Conveyor:</td>
                      <td><input name="killingLine" placeholder="" type="checkbox" id="killingLine" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="killingLine" placeholder="" type="checkbox" id="killingLine" maxlength="200"  value="Not Clean" class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                    
                       <tr>
                     <td>Shackles:</td>
                      <td><input name="shackles" placeholder="" type="checkbox" id="shackles" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="shackles" placeholder="" type="checkbox" id="shackles" maxlength="200"  value="Not Clean" class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                       <tr>
                     <td>Feet Unloader:</td>
                      <td><input name="feetUnloader" placeholder="" type="checkbox" id="feetUnloader" maxlength="200" value="Clean"  class="round default-width-input" style="width:120px " /></td>
                      <td><input name="feetUnloader" placeholder="" type="checkbox" id="feetUnloader" maxlength="200"  value="Not Clean"class="round default-width-input" style="width:120px " /></td></tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                     <tr> <td>Hock Cutter &nbsp;</td><td>
                      <select name="hockCutter">                                                                                                                                       <option value="Clean">Clean</option>
                      <option value="Not Clean">Not Clean</option>                      
                      <option value="Not Wash">Not Washed</option>
                      </select>
                      </td>
                      <td>
                                        </tr>
                      <td>&nbsp; </td>
                     <td>&nbsp; </td>
                       <tr>
                    <td>Remark/Corrective action</td>
                      <td><textarea name="remark" placeholder="ENTER REMARK! "cols="15" class="round" style="width:400px "><?php echo $remark; ?></textarea></td>
                      </tr>
                     <td>&nbsp; </td>
                     <td>&nbsp; </td>
                      
                  <table class="form">
                    <tr>
                     <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Add" >
                     </td><td>			(Control + S)
                     <input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
                     <td>&nbsp; </td> <td>&nbsp; </td>
                    </tr>
                </table></div>
                </form>
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p> &copy;Copyright 2013</p>

	
	</div> <!-- end footer -->

</body>
</html>