<?php
/*
  Plugin Name: Registration Form
  Description: User registry
  Version: 1.0
  Author: Quang Hung
 */
require 'inc/registration.php';
if(is_admin()){
    include_once 'admin/fields_attribute.php';
    include_once 'admin/fields_type.php';
    include_once 'admin/admin_registration.php';    
    
}
?>