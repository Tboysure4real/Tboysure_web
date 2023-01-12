<?php
$conn = mysqli_connect("localhost","root","","posnic");
      if($conn)
      {
        //echo "connected";
      }else{
        echo "not Connected to the database";
      }
	  
	   $sql ="SELECT * FROM qc_graph";
    $result = $conn->query($sql);
     
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $arr = array(
              
                'y'=>(explode(',',$row['y'])),
                //'y'=>array_map('intval',explode(', ',$row['y'])),
                //'y'=>array_map('intval',explode(',',$row['y'])),
                //'label'=>array_map('intval',explode(',',$row['label']))
                'label'=>array_map(explode('intval','',$row['label']))
            );
            $dataPoints[] =  $arr;
           // $series_array[] = $arr;
            echo "<prev>";
          echo($row['label']);
          echo($row['y']);
          echo "</prev>";       
        }
        return json_encode($dataPoints);
    }else{
            echo "0 result";
        }
        $conn->close;
	  ?>