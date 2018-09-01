<?php
    
    include 'connect.php';
    // Routes

	$tpl 	= 'include/templates/'; // Template Directory
	$lang 	= 'include/languages/'; // Language Directory
	$func	= 'include/functions/'; // Functions Directory
	$css 	= 'layout/css/'; // Css Directory
	$js 	= 'layout/js/'; // Js Directory

	// Include The Important Files

	include $func . 'function.php';
	
	include $lang . 'english.php';

	include $tpl . 'header.php' ;



	if (!isset($noNavbar)){	include $tpl . 'navbar.php' ;} // include hte navbar Expect The Pages With $Nonavbar Var  