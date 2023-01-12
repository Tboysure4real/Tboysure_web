<?php
$arr = array('php', 'html','xml','json','ajax');

print_r ($arr);
echo "<br>";

$str = implode(' ',$arr);
print_r ($str);
echo "<br>";

$newstr = "Hello Tboysure how are you doing my love";
$newarr = explode(' ',$newstr);
print_r($newarr);
?>