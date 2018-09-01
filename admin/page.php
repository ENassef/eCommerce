<?php 

	/*
		Categories => [ Manage | Edit | Update | Delete | Add | Insert | Stats ]

		if shortCut =>  Condation ? true : false 
	*/



	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ; 

	// if the main page 

	if ($do == 'Manage'){

		echo 'Manage';

	} elseif($do = 'Add'){

		echo 'Add';

	}elseif($do = 'Insert'){

		echo 'Insert';

	}else{

		echo 'Error There\'s no page with this name';

	}