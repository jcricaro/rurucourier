<a href="<?php echo base_url();?>admin/reports_single">Single Reports</a>
<br/>
<a href="<?php echo base_url();?>admin/reports_job">Job Order Reports</a>


<div class="row">
    <div class="span12">

        <?php if($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 3): ?>
    	<h4>Update Delivery Status</h4>

    	<?php if($status[0]->state == 0): ?>
    	<a href="<?php echo base_url();?>admin/download_reports">Download</a>
    	<?php endif;?>

    	<?php if($status[0]->state == 1): ?>
        <?php echo $error; ?>
        <?php echo form_open_multipart('admin/reports_upload'); ?>
        <input type="file" name="userfile" size="20"/>
        <input type="submit" value="upload" class="btn" />
        <?php echo form_close(); ?>
    	<?php endif; ?>
        <?php endif; ?>
    </div>
</div>