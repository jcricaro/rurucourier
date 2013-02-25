<?php echo form_open('admin/job_order_items_add/'.$details->id); ?>
		
		
				
		
			

			
<?php echo form_label('Item Code: ','item_code'); ?>
<?php echo '<span class="input-xlarge uneditable-input span2">'.strtoupper($item_code).'</span>'; ?>
				
				
<h4>Recepient:</h4>
<?php echo form_label('Last Name: ','last_name'); ?>
<?php echo form_input('last_name',set_value('last_name'),'id="last_name"'); ?>
<span class="text-error"><small><?php echo form_error('last_name'); ?></small></span>

<?php echo form_label('First Name: ','first_name'); ?>
<?php echo form_input('first_name',set_value('first_name'),'id="first_name"'); ?>
<span class="text-error"><small><?php echo form_error('first_name'); ?></small></span>

<?php echo form_label('Middle Name: ','middle_name'); ?>
<?php echo form_input('middle_name',set_value('middle_name'),'id="middle_name"'); ?>
<span class="text-error"><small><?php echo form_error('middle_name'); ?></small></span>
<h4>More Details:</h4>
<?php
echo form_label('Contact Number:', 'contact_number');
echo '<div class="input-prepend"><span class="add-on">#</span>';
echo form_input('contact_number',set_value('contact_number'), 'id="contact_number" class="span2"');
echo '</div>';
?>
<span class="text-error"><small><?php echo form_error('contact_number'); ?></small></span>
<?php echo form_label('Address: ','address'); ?>
<?php echo form_textarea('address',set_value('address'),'id="address"'); ?>
<span class="text-error"><small><?php echo form_error('address'); ?></small></span>




					<?php echo form_label('Description: ','description') ?>
					<?php echo form_textarea('description',set_value('description'),'id="description"'); ?>

        <?php
        echo form_label('Delivery type:','delivery_type');
        $dd_name = 'delivery_type';
        $sl_val = $this->input->post($dd_name);
        echo form_dropdown('delivery_type',array('Choose One','Ordinary Delivery','Rush Delivery'),set_value($dd_name,((!empty($sl_val))?"$sl_val":0)),'id="delivery_type"');
        ?>
        <small><span class="text-error"><?php echo form_error('delivery_type'); ?></span></small>

                <div id="transmit1">
        <?php
            echo form_label('Transmit time:','transmit_time');
            echo '<span class="input-xlarge uneditable-input span2">2-3 Days</span>';
        ?>
        </div>
        <div id="transmit2">
        <?php
            echo form_label('Transmit time:','transmit_time');
            $t_name = "transmit_time";
            $t_val = $this->input->post($t_name);
            echo form_dropdown('transmit_time',array('Choose One','Same day','Next day'),set_value($t_name,((!empty($t_val))?"$t_val":0)),'id="transmit_time"');
        ?>
        <small><span class="text-error"><?php echo form_error('transmit_time');?></small>
        </div>


        <div id="box1">
        <?php echo form_label('Box:','box'); ?>
        <?php
        $bx_name = 'box';
        $bx_val = $this->input->post($bx_name);

        echo form_dropdown($bx_name,array('Coose One','Yes','No'),set_value($bx_name,((!empty($bx_val))?"$bx_val":0)),'id="box" class="span2"'); ?>
        <span class="text-error"><small><?php echo form_error('box'); ?></small></span>
        </div>

        <div id="dimensions">
            <?php echo form_label('Length:','length'); ?>
            <?php
                echo '<div class="input-append">';
                echo form_input('length','0','id="length" class="span1" style="text-align:right;"');
                echo '<span class="add-on">cm</span></div>';
            ?>
            <?php echo form_label('Width:','width'); ?>
            <?php
                echo '<div class="input-append">';
                echo form_input('width','0','id="width" class="span1" style="text-align:right;"');
                echo '<span class="add-on">cm</span></div>';
            ?>
            <?php echo form_label('Height:','height'); ?>
            <?php
                echo '<div class="input-append">';
                echo form_input('height','0','id="height" class="span1" style="text-align:right;"');
                echo '<span class="add-on">cm</span></div>';
            ?>
        </div>

        <div id="weight_option">
        <?php
            echo form_label('Weight:','weight_ordinary');
            $d_name = 'weight';
            $s_val = $this->input->post($d_name);
            echo form_dropdown('weight', array('Choose One','Small(up to 500g)','Medium(500g to 2kg)','Large(2kg to 3kg)','Cargo(1st 3kg)'),set_value($d_name,((!empty($s_val))?"$s_val":0)), 'id="weight"');
        ?>
        <?php echo form_error('weight'); ?>
        <small><span class="text-error"><?php echo form_error('weight');?></span></small>
        </div>
        <div id="add_cargo_weight">
            <?php
                echo form_label('Additional weight:','add_cargo_weight');
                echo '<div class="input-append">';
                echo form_input('add_weight','0','id="add_weight" class="span1" style="text-align:right;"');
                echo '<span class="add-on">kg</span></div>';
            ?>
        </div>




		<?php echo form_submit('submit','Save','class="btn btn-primary"'); ?>

		

					
		


		<?php echo form_close() ?>