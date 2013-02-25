<div class="row">
        <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/delivery">Delivery</a> <span class="divider">/</span></li>
        <li><a href="<?php echo base_url(); ?>admin/job_order">Job Order</a> <span class="divider">/</span></li>
        <li><a href="<?php echo base_url(); ?>admin/job_order_manual">Manual</a> <span class="divider">/</span></li>
        <li class="active">#<?php echo strtoupper($details->job_order_number); ?></li>
    </ul>
</div>

<div class="row">
    <div class="span3">
        Job Order #: <b><?php echo strtoupper($details->job_order_number); ?></b>
    </div>
    <div class="span3">
        
        Client Name: <b><?php echo $details->client_name; ?></b>
    </div>
    <div class="span3">
        Pickup Date: <b><?php echo $details->pickup_date; ?></b>
    </div>
    <div class="3">
        <a class="btn btn-primary" href="<?php echo base_url();?>admin/delivery">Confirm</a>
        <a class="btn btn-primary" href="#" onclick="window.print();return false;">Print</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>admin/job_order_delete/<?php echo $details->id ?>" onclick="return confirm('Are you sure want to cancel?');"">Cancel</a>
    </div>
</div>

<div class="row">
<hr />
<?php $tprice = 0 ;?>
<?php if($current !== false): ?>
<table class="table table-bordered table-striped table-hover">
    <thead class="info">
        <th>
            Item Code
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
            Details
        </th>
        <th>
            Price
        </th>
        <th>
        </th>
    </thead>
    <?php foreach($current as $row): ?>
    <tr>
        <td>
            <strong><?php echo strtoupper($row->item_code); ?></strong>
        </td>
        <td>
            <?php echo $row->last_name; ?>, <?php echo $row->first_name; ?>
        </td>
        <td>
            <?php echo $row->contact_number; ?>
        </td>
        <td>
            <?php echo $row->address; ?>
        </td>
        <td>
            <ul>
                <li>
                    <?php 
                    if($row->area_r == 1){ 
                        echo 'Metro Manila';
                    } 
                    else if($row->area_r == 2){ 
                        echo 'Metro Manila 2';
                    } 
                    else if($row->area_r == 3){ 
                        echo 'Luzon';
                    } 
                    else if($row->area_r == 4){ 
                        echo 'Visayas';
                    }
                    else if($row->area_r == 5){ 
                        echo 'Mindanao';
                    } 
                    ?>
                </li>
                <li>
                    <?php
                    if($row->delivery_type == 1) {
                        echo 'Ordinary';
                    }
                    else if($row->delivery_type == 2) {
                        echo 'Rushed';
                    }
                    ?>
                </li>
                <?php
                    if($row->box == 1) {
                        echo '<li>Boxed</li>';
                    }
                ?>
                


            </ul>
        </td>
        <td>
            <b>P
                <?php echo $row->price; ?>
                <?php $tprice = $tprice + $row->price; ?>
            </b>
        </td>
        <td>
            <a href="<?php echo base_url();?>admin/job_order_items_delete/<?php echo $row->id; ?>"><i class="icon-remove"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5">
            Total:
        </td>
        <td colspan="2" class="text-error">
            <b>P <?php echo $tprice ?></b>
        </td>
    </tr>
</table>
<?php endif; ?>
</hr />
</div>

<div class="row">
    <?php if($quantity !== false): ?>
    <?php echo form_open('admin/job_order_items/'.$details->id.'/'.$this->uri->segment(4)); ?>
    <table class="table table-bordered table-striped table-hover">
        <thead class="info">
            <th>
                ID
            </th>
            <th>
                Recepient Details
            </th>
            <th>
                Item Details
            </th>
        </thead>
        <?php for($i=0;$i<$quantity;$i++): ?>
        <tr>
            <td>
                <b><?php echo ($i+1); ?></b>
            </td>
            <td>

            <div class="span6">
            <?php echo form_label('Name: ',NULL); ?>
            <?php echo form_input('last_name['.$i.']',set_value('last_name['.$i.']'),'id="last_name['.$i.']" placeholder="Last Name" class="input-small"'); ?>
            <span class="text-error"><small><?php echo form_error('last_name['.$i.']'); ?></small></span>
            
            <?php echo form_input('first_name['.$i.']',set_value('first_name['.$i.']'),'id="first_name['.$i.']" placeholder="First Name" class="input-small"'); ?>
            <span class="text-error"><small><?php echo form_error('first_name['.$i.']'); ?></small></span>
            
            <?php echo form_input('middle_name['.$i.']',set_value('middle_name['.$i.']'),'id="middle_name['.$i.']" placeholder="Middle" class="input-mini"'); ?>
            <span class="text-error"><small><?php echo form_error('middle_name['.$i.']'); ?></small></span>
            <?php echo form_label('Contact Number: ', NULL); ?>
            <?php echo '<div class="input-prepend"><span class="add-on">#</span>';
            echo form_input('contact_number['.$i.']',set_value('contact_number['.$i.']'), 'id="contact_number" class="span2" placeholder="Contact Number"');
            echo '</div>'; ?>        
            <span class="text-error"><small><?php echo form_error('contact_number['.$i.']'); ?></small></span>
            </div>
            <div class="span4">
            

            <?php echo form_label('Address: ', NULL); ?>
            <?php
                $ta[$i] = array(
                    'name' => "address".'['.$i.']',
                    'rows' => '4',
                    'id' => "address".'['.$i.']',
                    'placeholder' => "Address",
                    'class' => "span3",
                    'value' => set_value('address['.$i.']')
                );
            ?>

            <?php echo form_textarea($ta[$i]); ?>
            <span class="text-error"><small><?php echo form_error('address['.$i.']'); ?></small></span>
            </div>

            </td>
            <td>
            <?php echo form_dropdown('area_r['.$i.']',array('Area','Metro Manila 1','Metro Manila 2','Luzon','Visayas','Mindanao'),set_value('area_r['.$i.']'),'id="area['.$i.']"'); ?>
                <small><span class="text-error"><?php echo form_error('area_r['.$i.']'); ?></span></small>
                <?php
                
                $dd_name = 'delivery_type['.$i.']';
                $sl_val = $this->input->post($dd_name);
                echo form_dropdown('delivery_type['.$i.']',array('Delivery Type','Ordinary Delivery','Rush Delivery'),set_value($dd_name,((!empty($sl_val))?"$sl_val":0)),'id="delivery_type'.$i.'"');
                ?>
                <small><span class="text-error"><?php echo form_error('delivery_type['.$i.']'); ?></span></small>
                <div id="transmita<?php echo $i; ?>">
                <?php
                    echo form_label('Transmit time:','transmit_time');
                    echo '<span class="input-xlarge uneditable-input span2">'.$dprice->c6.'</span>';
                ?>
                </div>
                <div id="transmitb<?php echo $i; ?>">
                <?php
                    echo form_label('Transmit time:','transmit_time');
                    $t_name = "transmit_time[".$i."]";
                    $t_val = $this->input->post($t_name);
                    echo form_dropdown('transmit_time['.$i.']',array('Choose One',$dprice->c16,$dprice->c17),set_value($t_name,((!empty($t_val))?"$t_val":0)),'id="transmit_time['.$i.']"');
                ?>
                <small><span class="text-error"><?php echo form_error('transmit_time');?></small>
                </div>
                <div id="box1<?php echo $i; ?>">
                <?php echo form_label('Box:','box'); ?>
                <?php
                $bx_name = 'box['.$i.']';
                $bx_val = $this->input->post($bx_name);
                $bid = 'box2'.$i;
                echo form_dropdown('box['.$i.']',array('Coose One','Yes','No'),set_value($bx_name,((!empty($bx_val))?"$bx_val":0)),'class="span2" id="'.$bid.'"'); 
                ?>
                <span class="text-error"><small><?php echo form_error('box['.$i.']'); ?></small></span>
                </div>
                <div id="dimensions<?php echo $i; ?>">
                    <?php echo form_label('Length:','length'); ?>
                    <?php
                        echo '<div class="input-append">';
                        echo form_input('length['.$i.']','0','id="length['.$i.']" class="span1" style="text-align:right;"');
                        echo '<span class="add-on">cm</span></div>';
                    ?>
                    <?php echo form_label('Width:','width'); ?>
                    <?php
                        echo '<div class="input-append">';
                        echo form_input('width['.$i.']','0','id="width['.$i.']" class="span1" style="text-align:right;"');
                        echo '<span class="add-on">cm</span></div>';
                    ?>
                    <?php echo form_label('Height:','height'); ?>
                    <?php
                        echo '<div class="input-append">';
                        echo form_input('height['.$i.']','0','id="height['.$i.']" class="span1" style="text-align:right;"');
                        echo '<span class="add-on">cm</span></div>';
                    ?>
                </div>
                <div id="weight_option<?php echo $i; ?>">
                <?php
                    echo form_label('Weight:','weight_ordinary');
                    $d_name = 'weight['.$i.']';
                    $s_val = $this->input->post($d_name);
                    echo form_dropdown('weight['.$i.']', array('Choose One',$dprice->c1,$dprice->c2,$dprice->c3,$dprice->c4,$dprice->c5),set_value($d_name,((!empty($s_val))?"$s_val":0)), 'id="weight'.$i.'"');
                ?>
                <?php echo form_error('weight['.$i.']'); ?>
                <small><span class="text-error"><?php echo form_error('weight['.$i.']');?></span></small>
                </div>
                <div id="add_cargo_weight<?php echo $i;?>">
                    <?php
                        echo form_label('Additional weight:','add_cargo_weight');
                        echo '<div class="input-append">';
                        echo form_input('add_weight['.$i.']','0','id="add_weight['.$i.']" class="span1" style="text-align:right;"');
                        echo '<span class="add-on">kg</span></div>';
                    ?>
                </div>
                <br/>


                <?php
                $twe[$i] = array(
                    'name' => 'description['.$i.']',
                    'rows' => '4',
                    'id' => "description[".$i."]",
                    'placeholder' => "Description",
                    'class' => "span3",
                    'value' => set_value('description['.$i.']')
                );
                ?>
        
                <?php echo form_textarea($twe[$i]); ?>
                <input type="hidden" name="valuable[<?php echo $i; ?>]" value="0" />
                <label class="checkbox">
                <?php
                $cb[$i] = array(
                'name' => 'valuable['.$i.']',
                'id' => 'valuable',
                'value' => '1',
                'checked' => FALSE
                );

                echo form_checkbox($cb[$i]);
                ?>
                Valuable
                </label>
            </td>

        </tr>

        <?php endfor; ?>

    </table>
    <?php echo form_submit('submit', 'Save items', 'class="btn btn-primary"'); ?>

    <?php echo form_close(); ?>
    <?php endif; ?>
	
</div>

<script type="text/javascript">   
    $(document).ready(function() {
        <?php for($i=0;$i<$quantity;$i++): ?>    
        $("#delivery_type<?php echo $i;?>").change(handleNewSelection4<?php echo $i;?>);
        handleNewSelection4<?php echo $i;?>.apply($("#delivery_type<?php echo $i;?>")); 

        $("#box2<?php echo $i;?>").change(handleNewSelection2<?php echo $i; ?>);
        handleNewSelection2<?php echo $i;?>.apply($("#box2<?php echo $i;?>"));

        $("#weight<?php echo $i;?>").change(handleNewSelection3<?php echo $i ;?>);
        handleNewSelection3<?php echo $i;?>.apply($("#weight<?php echo $i;?>"));

        <?php endfor;?>
        
        
    });
    <?php for($i=0;$i<$quantity;$i++): ?>
    handleNewSelection4<?php echo $i; ?> = function() {

        hides<?php echo $i; ?>();
          
        switch($(this).val()) {
            
            case '1':
                $("#transmita<?php echo $i;?>").show('slow');
                $("#box1<?php echo $i; ?>").show('slow');
            break;
            case '2':
                $("#transmitb<?php echo $i;?>").show('slow');
                $("#box1<?php echo $i; ?>").show('slow');
            break;
            
        }
        
    }
    
    hides<?php echo $i; ?> = function() {
    
    $("#transmita<?php echo $i; ?>").hide();
    $("#transmitb<?php echo $i; ?>").hide();
    $("#box1<?php echo $i; ?>").hide();
    
    }

    handleNewSelection2<?php echo $i;?> = function() {
        hide2<?php echo $i;?>();
        switch($(this).val()) {
            case '1':
                $("#dimensions<?php echo $i;?>").show('slow');
            break;
            case '2':
                $("#weight_option<?php echo $i;?>").show('slow');
            break;
        }
    }

    hide2<?php echo $i;?> = function() {
        $("#weight_option<?php echo $i;?>").hide();
        $("#add_cargo_weight<?php echo $i;?>").hide();
        $("#dimensions<?php echo $i;?>").hide();
        
    }

    handleNewSelection3<?php echo $i;?> = function() {
        hide3<?php echo $i;?>();
        switch($(this).val()) {
            case '5':
                $("#add_cargo_weight<?php echo $i;?>").show('slow');
        }
    }

    hide3<?php echo $i;?> = function() {
        $("#add_cargo_weight<?php echo $i;?>").hide();
        $("#dimensions<?php echo $i;?>").hide();
    }


    <?php endfor; ?>

    

    
    
</script>

