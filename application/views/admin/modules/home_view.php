<h3>Feedback</h3>
<table class="table table-bordered table-condensed">
	<tr>
		<th style="text-align:center;">
			ID
		</th>
		<th class="span3">
			Author
		</th>
		<th>
			Feedback
		</th>
		<th class="span1">
			Actions
		</th>
	</tr>
	<?php foreach($feedbacks as $row): ?>
	<tr <?php if($row->status == 2) {
		echo 'class="error"';
	} else if($row->status == 1) {
		echo 'class="info"';
	} ?>>
		<td class="span1" style="text-align:right;">
			<b><?php echo $row->id; ?></b>
		</td>
		<td>
			<?php echo $row->author; ?>
		</td>
		<td>
			"<b><?php echo $row->comment; ?></b>"
		</td>
		<td style="text-align:center;">
			<a href="<?php echo base_url(); ?>admin/update_feedback/accept/<?php echo $row->id; ?>"><i class="icon-ok"></i></a>
			<a href="<?php echo base_url(); ?>admin/update_feedback/deny/<?php echo $row->id; ?>"><i class="icon-remove"></i></a>
		</td>
	</tr>	
	<?php endforeach; ?>
</table>