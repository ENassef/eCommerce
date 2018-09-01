<?php 
	
    session_start();


      if (isset($_SESSION['Username'])){

      		$pagetitle = 'DashBoard';

      	    include 'init.php';


      	    include $tpl . 'footer.php' ;
       
      }else{
      	header('location: index.php');
      }
