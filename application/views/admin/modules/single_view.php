
<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/delivery">Delivery</a> <span class="divider">/</span></li>
        <li class="active">New Single Order</li>
        </ul>
    </div>
</div>


<fieldset>
<?php echo form_open('admin/single'); ?>
<legend>
    Single Transaction
</legend>

<div class="row">
    <table class="span12">
        <tr>
            
            
            <td width="33%" valign="top">
            
            <h3>From</h3>
            <?php
                echo form_input('last_name', set_value('last_name') , 'id="last_name" placeholder="Last Name"');
            ?>
                <small><span class="text-error"><?php echo form_error('last_name'); ?></span></small>
                    
            <?php
                
                echo form_input('first_name', set_value('first_name'), 'id="first_name" placeholder="First Name"');
            ?>
                <small><span class="text-error"><?php echo form_error('first_name'); ?></span></small>
                    
            <?php
                echo form_input('middle_name',set_value('middle_name'), 'id="middle_name" placeholder="Middle Name"');
            ?>
                <small><span class="text-error"><?php echo form_error('middle_name'); ?></span></small>
                    
            <?php
                echo '<div class="input-prepend"><span class="add-on">#</span>';
                echo form_input('contact_number',set_value('contact_number'), 'id="contact_number" class="span2" placeholder="Contact Number"');
                echo '</div>';
                ?>
            <small><span class="text-error"><?php echo form_error('contact_number'); ?></span></small>
                    

            <!--<?php
                echo form_textarea('address',set_value('address'),'id="address" placeholder="Address"');
                ?>-->
                <h4>Address</h4>
                
                <?php echo form_input('street_address',set_value('street_address'),'placeholder="Street Address"'); ?>
                <small><span class="text-error"><?php echo form_error('street_address')    ?></span></small>
                <?php echo form_input('city_address',set_value('city_address'),'placeholder="City"'); ?>
                <small><span class="text-error"><?php echo form_error('city_address')    ?></span></small>
                <?php echo form_input('state_address',set_value('state_address'),'placeholder="State/Province"'); ?>
                <small><span class="text-error"><?php echo form_error('state_address')    ?></span></small>
                

            
            </td>
            
            <td width="33%" valign="top">
    
            <h3>Receiver:</h3>
            <?php
                echo form_input('last_name_r', set_value('last_name_r') , 'id="last_name_r" placeholder="Last Name"');
            ?>
                <small><span class="text-error"><?php echo form_error('last_name_r'); ?></span></small>
                    
            <?php
                echo form_input('first_name_r', set_value('first_name_r'), 'id="first_name_r" placeholder="First Name"');
            ?>
                <small><span class="text-error"><?php echo form_error('first_name_r'); ?></span></small>
                    
            <?php
                echo form_input('middle_name_r',set_value('middle_name_r'), 'id="middle_name_r" placeholder="Middle Name"');
            ?>
                <small><span class="text-error"><?php echo form_error('middle_name_r'); ?></span></small>
                    
            <?php
                echo '<div class="input-prepend"><span class="add-on">#</span>';
                echo form_input('contact_number_r',set_value('contact_number_r'), 'id="contact_number_r" class="span2" placeholder="Contact Number"');
                echo '</div>';
                ?>
            <small><span class="text-error"><?php echo form_error('contact_number_r'); ?></span></small>
                    
            <?php
                echo form_dropdown('area_r',array('Area','Metro Manila 1','Metro Manila 2','Luzon','Visayas','Mindanao'),set_value('area_r'),'id="area"');
            ?>
            <small><span class="text-error"><?php echo form_error('area_r'); ?></span></small>
            <!--
            <?php
                echo form_textarea('address_r',set_value('address_r'),'id="address_r" placeholder="Address"');
                ?>
            <small><span class="text-error"><?php echo form_error('address_r'); ?></span></small>
        -->
            <h4>Address</h4>
                
                <?php echo form_input('street_address_r',set_value('street_address_r'),'placeholder="Street Address"'); ?>
                <small><span class="text-error"><?php echo form_error('street_address_r')    ?></span></small>
                <?php echo form_input('city_address_r',set_value('city_address_r'),'placeholder="City"'); ?>
                <small><span class="text-error"><?php echo form_error('city_address_r')    ?></span></small>
                <?php echo form_input('state_address_r',set_value('state_address_r'),'placeholder="State/Province"'); ?>
                <small><span class="text-error"><?php echo form_error('state_address_r')    ?></span></small>
        
            </td>
        
            <td width="33%" valign="top">
    
            <h3>Transaction:</h3>
            <?php
            echo form_label('Item Code:', 'item_code');
            echo '<span class="input-small uneditable-input span2">';
            echo $code;
            echo '</span>';
            
            ?>
                <br/>
                <?php
                
                $textarea = array(
                      'name'        => 'description',
                      'id'          => 'description',
                      'value'       => set_value('description'),
                      'rows'  => '3',
                      'placeholder' => 'Description'
                    );
                echo form_textarea($textarea);
                ?>
                <?php echo form_error('description'); ?>
                
                
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
                    echo '<span class="input-xlarge uneditable-input span2">'.$dprice->c6.'</span>';
                ?>
                </div>
                <div id="transmit2">
                <?php
                    echo form_label('Transmit time:','transmit_time');
                    $t_name = "transmit_time";
                    $t_val = $this->input->post($t_name);
                    echo form_dropdown('transmit_time',array('Choose One',$dprice->c16,$dprice->c17),set_value($t_name,((!empty($t_val))?"$t_val":0)),'id="transmit_time"');
                ?>
                <small><span class="text-error"><?php echo form_error('transmit_time');?></small>
                </div>


                <div id="box1">
                <?php echo form_label('Box:','box'); ?>
                <?php
                $bx_name = 'box';
                $bx_val = $this->input->post($bx_name);

                echo form_dropdown($bx_name,array('Coose One','Yes','No'),set_value($bx_name,((!empty($bx_val))?"$bx_val":0)),'id="box" class="span2"'); ?>
                <?php echo form_error('box'); ?>
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
                    echo form_dropdown('weight', array('Choose One',$dprice->c1,$dprice->c2,$dprice->c3,$dprice->c4,$dprice->c5),set_value($d_name,((!empty($s_val))?"$s_val":0)), 'id="weight"');
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
                <br/>
                <label class="checkbox">
                <?php
                $cb = array(
                'name' => 'valuable',
                'id' => 'valuable',
                'value' => '1',
                'checked' => FALSE
                );

                echo form_checkbox($cb);
                ?>
                Valuable
                </label>

                <br/>
                <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"'); ?>

                

                </td>
            </tr>
        </table>
    

</div>

<?php echo form_close(); ?>

</fieldset>