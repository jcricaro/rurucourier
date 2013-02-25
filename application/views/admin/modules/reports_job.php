<div class="row">
<div class="span12">
<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>admin/reports">Reports</a> <span class="divider">/</span></li>
    <li class="active">Job Order Report</li>
</ul>
</div>
</div>
<div class="row">
	<div class="span12">
		<!--
		<?php echo form_open('admin/reports'); ?>
		<?php echo form_dropdown('type',array('Single','Job Order'),set_value('type'),'id="type"'); ?>
		<?php echo form_dropdown('duration',array('All time','This Month'),set_value('duration'),'id="duration"'); ?>
		<?php echo form_submit('submit','Search','class="btn"'); ?>

		<?php echo form_close(); ?>-->
	</div>
</div>
<div class="row">
	<div class="span12">
<table class="table table-bordered table-hover table-condensed">
	<thead>
		<th>
			ID
		</th>
		<th>
			Item Code
		</th>
		<th>
			Name
		</th>
		<th>
			Contact Number
		</th>
		<th>
			Area
		</th>
		<th>
			Date
		</th>
		<th>
			Status
		</th>
		<th>
			Actions
		</th>
	</thead>
	<tbody>
		
			<?php
			if($rows !== false)	 {


			foreach($rows as $r) {
				echo '<tr><td>';
				echo '<a href="'.base_url();
				echo 'admin/reports_view/';
				echo $r->id;
				echo '">';

				echo  $r->id;
				echo '</a>';
				echo '</td>';



				echo '<td>'.strtoupper($r->item_code);'</td>';
				echo '<td>'.$r->last_name;
				echo  ', '.$r->first_name;
				echo ', '.$r->middle_name;
				echo '<td>'.$r->contact_number;'</td></tr>';



				echo '<td>';
				if($r->area_r == 1) {
					echo 'Metro Manila';
				}
				else if($r->area_r == 2) {
					echo 'Luzon';
				}
				else if($r->area_r == 3) {
					echo 'Visayaz';
				}
				else if($r->area_r == 4) {
					echo 'Mindanao';
				}
				echo '</td>';


				echo '<td>';
        		echo date('m/d/Y',strtotime($r->date));
				echo '</td>';

				echo '<td>';
				echo $r->status;
				echo '</td>';

				echo '<td>';
				echo '<a href="'.base_url();
				echo 'admin/reports_view/';
				echo $r->id;
				echo '">';

				echo 'View';
				echo '</a>';
				echo '</td>';
				echo '</tr>';	

			}

			}
			?>
	</tbody>
</table>
	</div>
	</div>
<div class="row">

	<div class="span12" style="text-align:right;">
		<div class="pagination">
		<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
<?php foreach($rows as $r): ?>
function confirm_delete<?php echo $r->id; ?>(){
    var r<?php echo $r->id; ?>=confirm("Are you sure?");
    if (r<?php echo $r->id; ?>==true){
		window.location = "<?php echo base_url() ?>admin/reports_delete/<?php echo $r->id; ?>"
    }else{
      
    }
}
<?php endforeach; ?>
</script>
