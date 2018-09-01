<?php

	/*
	** The Title Function 
	**
	*/

	function getTitle(){

		global $pagetitle;

		if (isset($pagetitle)){

			echo $pagetitle;

		}else{
			echo lang('Default');
		}


	}