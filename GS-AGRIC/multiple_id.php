<?php
//Multiple id
$arr = array();
$arr1 = array();

for ($i=0; $i < $count; $i++) {
    $name_query = 'name'.$i ;
    $age_query = 'age'.$i ;
    array_push($arr,$_POST[$name_query]);
    array_push($arr1,$_POST[$age_query]);
}

for ($i=0; $i < $count; $i++) {
    $curr_name = $arr[$i];
    $curr_age = $arr1[$i];
    $user_id = $_SESSION['s_id'];
    $query = "INSERT INTO orders(ferry_id,user_id,user_name, 
                                user_age, source, destination,date,cost) 
                VALUES('$selected_ferry', '$user_id' , '$curr_name', 
                        '$curr_age', '$source', '$destination', now(),$cost)";

    if(mysqli_query($connection, $query)){

        $last_id = mysqli_insert_id($connection);
        $fetch_id = "SELECT * FROM orders WHERE order_id = '$last_id'";
        $result = mysqli_query($connection,$fetch_id);  
        while($res = mysqli_fetch_array($result)) {  
            $hell = $res['order_id'];
            $hell = $res['order_id'];   

        }
        header("location:receipt2.php?order_id1=$hell"); 
    }
?>
