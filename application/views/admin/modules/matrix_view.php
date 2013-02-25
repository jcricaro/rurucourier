<div class="span9">



	<ul class="breadcrumb">
	    <li><a href="<?php echo base_url(); ?>admin/filemanager/home">File Maintenance</a> <span class="divider">/</span></li>
	    <li class="active">Price Matrix</li>
	</ul>



<?php echo form_open('admin/filemanager/matrix'); ?>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th colspan="5">
				Ordinary Delivery
			</th>
		</tr>
		<tr>
			<th class="span2">
				Description
			</th>
			<th>
				Metro Manila 1
			</th>
			<th>
				Metro Manila 2
			</th>
			<th>
				Luzon
			</th>
			<th>
				Visayas
			</th>
			<th>
				Mindanao
			</th>

		</tr>
		<thead>
		<tbody>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c1',
					'value' => $prices->c1,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c1'); ?></td>
			<td colspan="2" style="text-align:center;">
				<div class="input-append">
				<?php echo form_input('a1',$prices->a1,'id="a1" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a1'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a2',$prices->a2,'id="a2" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a2'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a3',$prices->a3,'id="a3" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a3'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a4',$prices->a4,'id="a4" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a4'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c2',
					'value' => $prices->c2,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c2'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('a5',$prices->a5,'id="a5" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a5'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a6',$prices->a6,'id="a6" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a6'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a7',$prices->a7,'id="a7" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a7'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a8',$prices->a8,'id="a8" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a8'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a9',$prices->a9,'id="a9" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a9'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c3',
					'value' => $prices->c3,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c3'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('a10',$prices->a10,'id="a10" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a10'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a11',$prices->a11,'id="a11" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a11'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a12',$prices->a12,'id="a12" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a12'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a13',$prices->a13,'id="a13" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a13'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a14',$prices->a14,'id="a14" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a14'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c4',
					'value' => $prices->c4,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c4'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('a15',$prices->a15,'id="a15" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a15'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a16',$prices->a16,'id="a16" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a16'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a17',$prices->a17,'id="a17" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a17'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a18',$prices->a18,'id="a18" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a18'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a19',$prices->a19,'id="a19" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a19'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c5',
					'value' => $prices->c5,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c5'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('a20',$prices->a20,'id="a20" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a20'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a21',$prices->a21,'id="a21" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a21'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a22',$prices->a22,'id="a22" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a22'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a23',$prices->a23,'id="a23" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a23'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a24',$prices->a24,'id="a24" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a24'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td>Add on per kilo</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a25',$prices->a25,'id="a25" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a25'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a26',$prices->a26,'id="a26" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a26'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a27',$prices->a27,'id="a27" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a27'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a28',$prices->a28,'id="a28" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a28'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('a29',$prices->a29,'id="a29" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('a29'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><b>Transmit Time</b></td>
			<td colspan="5"><?php 
				$data = array(
					'name' => 'c6',
					'value' => $prices->c6,
					);
				echo form_input($data); ?>
				<?php echo form_error('c6'); ?></td>
			
		</tr>
		</tbody>
	</table>




	<table class="table table-bordered">
		<thead>
		<tr>
			<th colspan="6">
				Rushed Delivery
			</th>
		</tr>
		<tr>
			<th class="span2">
				Description
			</th>
			<th colspan="2" style="text-align:center;">
				Metro Manila
			</th>
			<th>
				Luzon
			</th>
			<th>
				Visayas
			</th>
			<th>
				Mindanao
			</th>

		</tr>
		<thead>
		<tbody>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c11',
					'value' => $prices->c11,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c11'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('b1',$prices->b1,'id="b1" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b1'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b2',$prices->b2,'id="b2" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b2'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b3',$prices->b3,'id="b3" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b3'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b4',$prices->b4,'id="b4" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b4'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b5',$prices->b5,'id="b5" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b5'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c12',
					'value' => $prices->c12,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c12'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('b6',$prices->b6,'id="b6" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b6'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b7',$prices->b7,'id="b7" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b7'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b8',$prices->b8,'id="b8" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b8'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b9',$prices->b9,'id="b9" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b9'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b10',$prices->b10,'id="b10" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b10'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c13',
					'value' => $prices->c13,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c13'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('b11',$prices->b11,'id="b11" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b11'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b12',$prices->b12,'id="b12" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b12'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b13',$prices->b13,'id="b13" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b13'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b14',$prices->b14,'id="b14" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b14'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b15',$prices->b15,'id="b15" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b15'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><?php 
				$data = array(
					'name' => 'c14',
					'value' => $prices->c14,
					'class' => 'span2',
					'rows' => 2,
					);
				echo form_textarea($data); ?>
				<?php echo form_error('c14'); ?></td>
			<td>
				<div class="input-append">
				<?php echo form_input('b16',$prices->b16,'id="b16" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b16'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b17',$prices->b17,'id="b17" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b17'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b18',$prices->b18,'id="b18" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b18'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b19',$prices->b19,'id="b19" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b19'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b20',$prices->b20,'id="b20" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b20'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td>Add on per kilo</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b21',$prices->b21,'id="b21" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b21'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b22',$prices->b22,'id="b22" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b22'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b23',$prices->b23,'id="b23" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b23'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b24',$prices->b24,'id="b24" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b24'); ?></small></span>
			</td>
			<td>
				<div class="input-append">
				<?php echo form_input('b25',$prices->b25,'id="b25" class="span1" style="text-align:right;"'); ?>
				<span class="add-on"></span>
				</div>
				<span class="text-error"><small><?php echo form_error('b25'); ?></small></span>
			</td>
		</tr>
		<tr>
			<td><b>Transmit Time</b></td>
			<td><?php 
				$data = array(
					'name' => 'c16',
					'value' => $prices->c16,
					'class' => 'input-small',
					);
				echo form_input($data); ?>
				<?php echo form_error('c16'); ?></td>
			<td colspan="4"><?php 
				$data = array(
					'name' => 'c17',
					'value' => $prices->c17,
					'class' => 'input-small',
					);
				echo form_input($data); ?>
				<?php echo form_error('c17'); ?></td>
			
		</tr>
		<tr>
			<td><b>Time cut off</b></td>
			<td>
				<?php echo form_input('d1',$prices->d1,'class="input-mini"'); ?>
				<?php echo form_error('d1'); ?>
			</td>
			<td>
				<?php echo form_input('d2',$prices->d2,'class="input-mini"'); ?>
				<?php echo form_error('d2'); ?>
			</td>
			<td>
				<?php echo form_input('d3',$prices->d3,'class="input-mini"'); ?>
				<?php echo form_error('d3'); ?>
			</td>
			<td>
				<?php echo form_input('d4',$prices->d4,'class="input-mini"'); ?>
				<?php echo form_error('d4'); ?>
			</td>
			<td>
				<?php echo form_input('d5',$prices->d5,'class="input-mini"'); ?>
				<?php echo form_error('d5'); ?>
			</td>
		</tr>
		</tbody>
	</table>

	<div class="row" style="text-align:right;">
	<?php echo form_submit('submit', 'Save','class="btn btn-primary"'); ?>
	</div>

<?php echo form_close(); ?>
</div>