<?php

    function lang($phrase){

        static $lang = array(
            
            'message'       =>  'Welcome To Our WebSite',
            
            'admin'         =>  'Eslam Nassef',
            
            'login page'    =>  'Login Page',
            
            'login'         =>  'login',
            
            'page'          =>  'Page',
            
            'username'      =>  'Username',
            
            'password'      =>  'PassWord',

            'Categories'    =>  'Categories',

            'home'          =>  'Home',
            
            'items'          =>  'Item',
            
            'members'       =>  'Members',

            'statistics'    =>  'Statistics',

            'logs'          =>  'Logs',

            'Default'       =>  'ECommerse'
        );
        
        return $lang[$phrase];

    }

