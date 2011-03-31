<?php

include_once("../app/controllers/IndexController.php");

$indexController = new IndexController();

echo "starting\n";
$indexController->invoke();
echo "stopping\n";


?>
