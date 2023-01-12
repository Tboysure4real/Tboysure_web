<?php

/*
$age = array("Peter"=>"35",
              "Ben"=>"37",
              "Joe"=>"43");

      echo "Peter is" .$age['Peter'] . "Years old";
      echo "<pre>";  
      print_r($age);
      echo"</pre>";

      $stuff = ["name"=>"Tboysure",
             "City"=>"ibadan",
             "Phone"=>"08067800992",
                  "friends"=>array("friend1"=>"Akeju Samson",
                              "City"=>"Ondo",
                               "phone"=>"08032098763"),
                     "family"=>array("brother"=>"Kboysure",
                           "city"=>"Ibadan",
                           "phone"=>"08069428537"),
                                "relatives"=>array("sister"=>"Mamamojensin",
                                                   "city"=>"Ibadan",
                                                    "phone"=>"08050528772")];
                                                  

$gs = ["arrival Department"=>array(
           "Mr Adeoti"=>"08067855432",
            "Mr Joel"=>"08054324242",
             "Mr abbass"=>"07098765433",

             "Accounting Department"=>array(
              "Mr Sodiq"=>"6785543209",
             "Mr kOLAWOLE"=>"08054324242",
              "Miss abbass"=>"07098765433",

              "Hot Water"=>array(
               "Mr Lekan"=>"08065243547",
              "Mr Saheed"=>"09087654321",
               "Miss Opeyemi"=>"07023456789",

               "Evisceration"=>array( 
                    "Mr Akeju"=>"80320822232",
                     "Mr Ayo"=>"09087987665",
                     "Mr Olamide"=>"09078654321"))))];

          $my_array = ["Jesis","is","lord", "he's","coming soon"];  
          //echo $my_array; 
          $string = implode(" ",$my_array);    
          echo ($string)  ; 
       echo $gs["arrival Department"]["Accounting Department"]["Hot Water"]["Mr Lekan"];                                     
        echo "<pre>" ;
        //print_r($gs) ;
        
      print_r($my_array);
       
        echo "</pre>";                                          


$string =("boy,girl,man,woman..male,femal");
$new_array = explode(",",$string);
//echo "<pre>";
print_r($new_array);
//echo "</pre>";
//var_dump($new_array);
//echo($new_array); 
 
$arr =["Monday"=>"mon","Tuesday"=>"Tue",2=>"Wed","Thursday"=>"Thur","Fri","Sat","Sunday"=>"Sun"];
var_dump($arr);
//echo($arr);
//foreach($arr as $key=>$value){
    // echo "<pre>";
    //var_dump($arr);
    //print_r($arr).PHP_EOL;
     //echo "</pre>"
     foreach($arr as $key){
          echo "<pre>";
          echo($key) .PHP_EOL;
          echo "</pre>";
     }
  foreach($arr as $key=>$value){
         echo "<pre>";
     echo $key . "=>" .$value .PHP_EOL; 
          echo "</pre>";
  }
 
*/
  $dataPoints = array(
           array("y"=>"25", "label"=>"Sunday"),
           array("y"=>"20", "label"=>"Monday"),
           array("y"=>"25", "label"=>"Tuesday"),
           array("y"=>"25", "label"=>"Wednesday"),
           array("y"=>"20", "label"=>"Thursday"),
           array("y"=>"20", "label"=>"Friday"),
           array("y"=>"20", "label"=>"Saturday")
      );            
  
  var_dump($dataPoints);
  foreach($dataPoints as $key=>$value){
     //$k[] = $key;
    $v[] = $value;
    // echo ($v) .PHP_EOL;
    // print_r($k);
  print_r($value).PHP_EOL;
    echo "<pre>";
     //echo $key . "=>" . $value .PHP_EOL;
     //echo "</pre>";
  }
?>