<html>
    <head>
        <title>Testing The Table Head and Foot</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
-->
</head>


<?php
if(isset($_POST['submit'])){
    //echo $_POST['check'];
    foreach ($_POST['check'] as $value) {
        echo $value ."</br>";
    }
} 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#form1 #select-all").click(function(){
          $("#form1 input[type='checkbox']").prop('ckecked',this.checked);
       });
    });
/*
$(document).ready(function(){
$("#select-all").click(function(){
    if($(this).is(":checked")){
        $(".check[]").prop('checked',true);
    }else{
        $(".check[]").prop('checked',false);
    }
})
});
*/
    </script>
<form id="form1" method="POST">
<input type="checkbox" id="select-all" />Select All
</p>
<input type="checkbox" name='check[]' value="Value 1" /> Value 1<br />
<input type="checkbox" name='check[]' value="Value 2" /> Value 2</br>
<input type="checkbox" name='check[]' value="Value 3" /> Value 3</br>
<input type="checkbox" name='check[]' value="Value 4" /> Value 4</br>
</p>
<input type="submit" name="submit" />
</form>

</html>