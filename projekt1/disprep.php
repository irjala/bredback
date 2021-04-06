<?php

include('parsedown.php');
$contents = file_get_contents('raport.md');
$Parsedown = new Parsedown();
echo $Parsedown->text($contents);

?>