<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/custom.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js" /></script>

</head>
<body>
<div class="container">

<div class="row page-header">
	<div class="span4">
    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" /></a>
    </div>
    

    <div class="btn-group" style="margin-top:75px; float:right;">
        <?php if($page == "home") {
            echo '<a class="btn btn-primary">Home</a>';
        }
        else {
            echo '<a href="';
            echo base_url();
            echo 'home"class="btn">Home</a>';
        }
        //
        if($page == "services") {
            echo '<a class="btn btn-primary">Services</a>';
        }
        else {
            echo '<a href="';
            echo base_url();
            echo 'home/services"class="btn">Services</a>';
        }
        //
        if($page == "aboutus") {
            echo '<a class="btn btn-primary">About Us</a>';
        }
        else {
            echo '<a href="';
            echo base_url();
            echo 'home/aboutus"class="btn">About Us</a>';
        }
        //
        if($page == "contactus") {
            echo '<a class="btn btn-primary">Contact Us</a>';
        }
        else {
            echo '<a href="';
            echo base_url();
            echo 'home/contactus"class="btn">Contact Us</a>';
        }
        

        if(isset($_SESSION['usertype']) !== false) {
        echo '<a href="';
        echo base_url();
        echo 'admin/home" class="btn btn-inverse">Admin Panel</a>';    
        echo '<a href="';
        echo base_url();
        echo 'admin/logout" class="btn btn-danger">Log Out</a>';    
        }
        else {

        echo '<a href="';
        echo base_url();
        echo 'login" class="btn btn-inverse">Login</a>';
        }
        
        ?>
        
        
        

    </div>
</div>