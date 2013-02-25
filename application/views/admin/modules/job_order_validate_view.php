<div class="span12">
<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>admin/job_order">Job Order</a> <span class="divider">/</span></li>
    <li><a href="<?php echo base_url(); ?>admin/job_order_upload">Import Spreadsheet</a> <span class="divider">/</span></li>
    <li class="active">Validate</li>
</ul>
</div>
<div class="span12">

<b>Job Order Number:</b> <?php echo '<span class="input-xlarge uneditable-input span2">'.strtoupper($job_order).'</span>'; ?>

<b>Quantity:</b> <?php echo $count-2; ?>
</div>
<hr />
<div class="span12">
<table class="table table-bordered table-condensed">
	<thead>
	<tr>
		<th>
		</th>
		<th>
			Recepients Name
		</th>
		<th>
			Contact Number
		</th>
		<th>
			Address
		</th>
		<th>
			Description
		</th>
		<th>
			Price
		</th>
	</tr>
	</thead>
	<tbody>
	<?php for($x = $pagenum; $x < $contains; $x++ ): ?>
	<?php $count = $x + 1; ?>
	<?php if(isset($last_name[$x]) != false): ?>
	<tr>
		<td style="text-align:right;">
			<b><?php echo $count; ?></b>
		</td>
		<td>	
		<?php echo $last_name[$x] ?>, <?php echo $first_name[$x]; ?>
		</td>
		<td>
		<?php echo $contact_number[$x]; ?>
		</td>
		<td>
		<?php echo $address[$x]; ?>
		</td>
		<td>
		<?php echo $details[$x]; ?>
		</td>
		<td class="info">
		<b>P</b> <?php echo $price[$x]; ?>
		</td>
	</tr>
	<?php endif; ?>
 	<?php endfor; ?>
 	</tbody>
 	<tr>
 		<td colspan="4" style="text-align:right;">
 			<b>Total Price:</b>
 		</td>
 		<td class="success">
 			<b>P</b> <?php echo $total_price; ?>
 		</td>
 	</tr>
</table>
</div>
<div class="span12" style="text-align:right;">
	<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
	</div>
</div>

<div class="span12" style="text-align:right;">
	<div class="btn-group">
	        <a href="<?php echo base_url();?>admin/delivery" class="btn">Confirm</a>
	        <a href="<?php echo base_url();?>admin/delivery" class="btn"><i class="icon-check"></i>&nbsp;</a>

	            <a href="<?php echo base_url();?>admin/job_order_delete/<?php echo $joborderid; ?>" class="btn">Cancel</a>
	            <a href="<?php echo base_url();?>admin/job_order_delete/<?php echo $joborderid; ?>" class="btn"><i class="icon-remove"></i>&nbsp;</a>
	</div>
</div>

