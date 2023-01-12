<html>
    <head>
        <title>Testing ajax</title>
</head>
<body>

<h1>Testing Ajax</h1>
<button type="button" id="btn">Click n see</button>
<p id="test">This text much change if the ajax is working fine</P>


<script src="js/query.js"></script>
<script>

  $(document).ready(function(){
    $("btn").on('click',function(){
      console.log('Jesus is lord');
        var play = new XMLHttpRequest();
        play.open("secon.php","GET",true);
        play.onload(function(){
            console.log(this.responseTest);
            alert('javascript is not working');
        });
        play.send();
    });
  });
  /*
 $(document).ready(function(){
  $("btn").click(function(){
    $("#test").load("secon.txt");
  });
 });

$(document).ready(function(){
  $("btn").on('click',function(){
  $.ajax({
    url:'',
    type: 'get',
    data: 'now.json',
    datatype: 'json',
    success: function(test){
        console.log('test');
        $("#test").html
    }
  })
  });
});
 */
</script>
</body>
    </html>




