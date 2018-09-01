<?php

    function lang($phrase){

        static $lang = array(
            
            'message'       =>  'مرحبا بك فى موقعنا يا ',
            
            'admin'         =>  'اسلام ناصف',
        
            'login page'    =>  'صفحه الدخول',
            
            'login'         =>  'دخول',
            
            'page'          =>  'صفحه',
            
            'username'      =>  'اسم المستخدم',
            
            'password'      =>  'كلمه المرور',
        );
        
        return $lang[$phrase];

    }