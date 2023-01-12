<?php
$conn = mysqli_connect("localhost","root","","posnic");
      if($conn)
      {
        //echo "connected";
      }else{
        echo "not Connected to the database";
      }
	  
	   $sql ="SELECT * FROM line_graph";
    $result = $conn->query($sql);
     
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $arr = array(
                'name'=>$row['name'],
                'data'=>array_map('intval',explode(',',$row['data']))
            );
            $series_array[] = $arr;
          echo "<prev>";
           echo($row['name']);
           echo($row['data']);
           echo "</prev>";
        }
        return json_encode($series_array);
    }else{
            echo "0 result";
        }
        $conn->close;
	  ?>