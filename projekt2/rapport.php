<?php include "init.php" ?>
<?php include "head.php" ?>

<div class="segment">
<?php
include('parsedown.php');
$contents = file_get_contents('raport.md');
$Parsedown = new Parsedown();
echo $Parsedown->text($contents);

?>
</div>


<?php include "footer.php" ?>