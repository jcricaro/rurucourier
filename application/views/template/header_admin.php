<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/smoothness/jquery-ui-1.8.23.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/custom.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/print.css" media="print" />
</head>

<body>
<div class="container">
    <div class="row page-header">
    	<div class="span4">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" /></a>
        </div>
        <div class="btn-group" style="margin-top:75px; float:right;">
            <a href="<?php echo base_url();?>admin/home" class="btn<?php echo ($page=="home") ? ' btn-primary': '' ?>">Home</a>
            <?php if($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2): ?>
            <a href="<?php echo base_url();?>admin/delivery" class="btn<?php echo ($page=="delivery") ? ' btn-primary': '' ?>">Delivery</a>
            <?php endif; ?>

            <a href="<?php echo base_url();?>admin/reports" class="btn<?php echo ($page=="reports") ? ' btn-primary': '' ?>">Reports</a>
            
            <?php if($_SESSION['usertype'] == 1): ?>
            <a href="<?php echo base_url();?>admin/filemanager/home" class="btn<?php echo ($page=="filemanager") ? ' btn-primary': '' ?>">File Maintenance</a>
            <?php endif; ?>
            <a href="<?php echo base_url();?>home" class="btn btn-inverse">Front Page</a>
            <a href="<?php echo base_url();?>admin/logout" class="btn btn-danger">Log Out</a>
        </div>
    </div>