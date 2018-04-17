<?php
include("../res/x5engine.php");
$nameList = array("uzh","wa4","ney","fhz","krr","svk","fpx","t2f","gga","6uh");
$charList = array("Y","2","S","G","P","R","H","F","F","R");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
