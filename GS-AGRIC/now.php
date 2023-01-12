<html>
<head>
    <title>
        Today
    </title>
</head>
<body>

<h1>Ajax Loader</h1>
   <button type="button" id="btn">Click To Get Content</button>
    <div id="first"></div>

<script src="js/query.js"></script>
<script type="text/javascript">
    /*
    document.getElementById('btn').addEventListener('click',loadText());
    function loadText(){
        console.log('loadText');
    }

$(document).ready(function(){
    $("btn").click(function(){
       const mydata = new XMLHttpRequest();
       mydata.open("GET","now.json");
       mydata.onload(function(){
        console.log(mydata.responseTest);
        var show =JSON.parse(mydata.responseTest);
   
       });
       mydata.send();
    });
});
  */

$(document).ready(function(){
    $("btn").click(function(){
const xhr = new XMLHttpRequest();
xhr.onload=function(){
console.log(this.responseTest);
};
xhr.open("GET",'secon.txt',true);
xhr.send();
});
});
/*
$(document).ready(function(){
  $("btn").on('click',function(){
  $.ajax({
    url:'',
    type: 'get',
    data: 'now.json',
    datatype: 'json'
    success: function(test){
        console.log(test);
        $("#test").html
    }
  })
  });
});*/
</script>
</body>
</html>