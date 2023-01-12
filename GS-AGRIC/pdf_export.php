<?php
include_once("init.php");

require_once __DIR__ . '/vendor/autoload.php';
//$mpdf = new \Mpdf\Mpdf();
//function generate_pdf($html=""){
$conn = mysqli_connect('localhost','root','','posnic');
$result = mysqli_query($conn, "SELECT * FROM items");

if(mysqli_num_rows($result)>0){
    $html = '<table id="" class="table table-striped table-bordered">'
    $html = '<tr>
    <th> ITEM ID</th>
    <th>Name</th>
    <th>QUANTITY GIVEN</th>
    <th>USER</th>
    <th>CATEGORY</th>
    <th>QUANTITY USED</th>
    <th>STOCK</th>
    <th>DESCRIPTION</th>
    </tr>'

    While($row = mysqli_fetch_assoc($result)){
<tbody>
$html. ='<tr>
<td>' .$row ['itemId'] .'</td>
<td>' .$row ['name'] . '</td>
<td>' .$row ['quantity_given'] .'</td>
<td>' .$row ['user'] .'</td>
<td>' .$row ['category'] .'</td>
<td>' .$row ['quantity_used'].' </td>
<td>' .$row ['stock'] .'</td>
<td>' .$row ['description'] .'</td>

</tr>'
</tbody>
$html = '</table>';
}else{
    $html = "Data Not Found!";
}
$mpdf = new \Mpdf\mpdf();
$mpdf->WriteHTML($html);
$file ='media/'.time().'.pdf';
$mpdf-> output($file, 'I');
</div>
</body>
     }  
  } 
?>