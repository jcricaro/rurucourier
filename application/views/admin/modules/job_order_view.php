

<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
  		<li><a href="<?php echo base_url(); ?>admin/delivery">Delivery</a> <span class="divider">/</span></li>
  		<li><a href="<?php echo base_url(); ?>admin/job_order">Job Order</a> <span class="divider">/</span></li>
  		<li class="active">Manual</li>
		</ul>
	</div>
</div>


<div class="row">
	<?php echo form_open('admin/job_order_manual'); ?>
	<div class="span4">
		
		
		<?php echo form_label('Ref #:', 'ref_number'); ?>
		<?php echo '<span class="input-xlarge uneditable-input span2">'.$code.'</span>'; ?>
		
		<?php echo form_label('Job Order Number: ','job_order_number'); ?>
		<?php echo form_input('joborder',set_value('joborder'),'placeholder="Job Order Number"'); ?>
		<span class="text-error"><small><?php echo form_error('joborder'); ?></small></span>

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
		<span class="text-error"><small><?php echo form_error('client_name'); ?></small></span>

		<?php echo form_label('Quantity: '); ?>
		<?php echo form_input('quantity',set_value('quantity'),'id="quantity"'); ?>

		<span class="text-error"><small><?php echo form_error('quantity'); ?></small></span>

	</div>
	<div class="span4">
		<?php echo form_label('Pick-up date: ', 'datepicker'); ?>
		<?php echo '<div class="input-append">'.form_input('datepicker',set_value('datepicker'),'id="datepicker" class="span2"').'<span class="add-on"><i class="icon-calendar"></i></span></div>'; ?>
		<span class="text-error"><small><?php echo form_error('pickup_date'); ?></small></span>

		<?php echo form_label('Delivery type: ', 'delivery_type'); ?>
		<?php echo form_dropdown('delivery_type',array('Choose One','Ordinary Delivery','Rushed Delivery'),set_value('delivery_type'),'id="delivery_type"'); ?>
		<span class="text-error"><small><?php echo form_error('delivery_type'); ?></small></span>
		

	</div>
	<div class="span4">
		<?php echo form_label('Received by: '); ?>
		<?php echo form_input('received_by',set_value('received_by'),'id="received_by"'); ?>
		<span class="text-error"><small><?php echo form_error('received_by'); ?></small></span>

		<?php echo form_label('Released by: '); ?>
		<?php echo form_input('released_by',set_value('released_by'),'id="released_by"'); ?>
		<span class="text-error"><small><?php echo form_error('released_by'); ?></small></span>
		<hr />
		<?php echo form_submit('submit', 'Save','class="btn btn-primary"'); ?>
	</div>
<?php echo form_close(); ?>
</div>

