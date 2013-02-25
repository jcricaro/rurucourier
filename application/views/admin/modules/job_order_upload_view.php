<div class="row">
        <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/delivery">Delivery</a> <span class="divider">/</span></li>
        <li><a href="<?php echo base_url(); ?>admin/job_order">Job Order</a> <span class="divider">/</span></li>
        <li class="active">Excel Upload</li>
    </ul>
</div>

<?php echo form_open_multipart('admin/do_upload');?>
<div class="row">
	<div class="span4">
		
		
		<?php echo form_label('Ref #:', 'ref_number'); ?>
		<?php echo '<span class="input-xlarge uneditable-input span2">'.$code.'</span>'; ?>

		<?php echo form_label('Job Order Number: '); ?>
		<?php echo form_input('job_order_number',set_value('job_order_number'),'id="job_order_number"'); ?>
		<span class="text-error"><small><?php echo form_error('job_order_number'); ?></small></span>		

		<?php echo form_label('Client Name: ','client_name'); ?>

		<select name="client_name" id="client_name">
		<option value="0">Select One</option>
		<?php
		foreach($clients as $c) {
			echo '<option value="'.$c->id.'">';

			echo $c->company_name.' - '.$c->branch;
			echo '</option>';
		}
		?>
		</select>

	</div>
	<div class="span4">
		<?php echo form_label('Pick-up date: ', 'datepicker'); ?>
		<?php echo '<div class="input-append">'.form_input('datepicker',set_value('datepicker'),'id="datepicker" class="span2"').'<span class="add-on"><i class="icon-calendar"></i></span></div>'; ?>
		<span class="text-error"><small><?php echo form_error('datepicker'); ?></small></span>
		<?php echo form_label('Received by: '); ?>
		<?php echo form_input('received_by',set_value('received_by'),'id="received_by"'); ?>
		<span class="text-error"><small><?php echo form_error('received_by'); ?></small></span>

		<?php echo form_label('Released by: '); ?>
		<?php echo form_input('released_by',set_value('released_by'),'id="released_by"'); ?>
		<span class="text-error"><small><?php echo form_error('released_by'); ?></small></span>		

	</div>
	<div class="span4">
<?php echo $error;?>
<!--<input type="file" name="userfile" size="20" />-->
<?php
	$upload = array('name' => 'userfile', 'class' => 'fileupload fileupload-new', 'value' => set_value('userfile'));
	echo form_upload($upload); 
?>
		<hr />
		<?php echo form_submit('submit', 'Save','class="btn btn-primary"'); ?>
	</div>

</div>
<?php echo form_close(); ?>