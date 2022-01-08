<?php
// PrintData($data);


// foreach($data as $persons){
//     var_dump($persons['name']);
// }

foreach ($data as $persons) {
    foreach($persons as $key=>$value){
        PrintData("{$key} = {$value} ");
    }
 }

?>


<h2>Page View</h2>