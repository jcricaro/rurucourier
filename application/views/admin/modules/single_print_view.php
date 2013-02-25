<div class="row">
    <div class="span12">
<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>admin/delivery">Delivery</a> <span class="divider">/</span></li>
    <li><a href="<?php echo base_url(); ?>admin/single">New Single Order</a> <span class="divider">/</span></li>
    <li class="active">Print and Confirm</li>
</ul>
    </div>
</div>



<div class="row">
    <div class="span12">
        <h1>Confirmation:</h1>
    </div>
</div>
<div class="row">
    <div class="span9">
    <table class="table table-bordered table-striped">
        <tr>
            <td colspan="2">
                <h3>Sender:</h3>
            </td>
            <td colspan="2">
                <h3>Receiver:</h3>
            </td>
        </tr>
        <tr>
            <td class="span2">
                <strong>Name:</strong>
            </td>
            <td>
            <?php echo $qu->first_name ?> <?php echo $qu->middle_name ?> <?php echo $qu->last_name ?>
            </td>
            <td class="span2">
                <strong>Name:</strong>
            </td>
            <td>
            <?php echo $qu->first_name_r ?> <?php echo $qu->middle_name_r ?> <?php echo $qu->last_name_r ?>
            </td>
        </tr>    
        
        <tr>
            <td class="span2">
                <strong>Contact Number:</strong>
            </td>
            <td>
            <?php echo $qu->contact_number ?>
            </td>
            <td class="span2">
                <strong>Contact Number:</strong>
            </td>
            <td>
            <?php echo $qu->contact_number_r ?>
            </td>
        </tr>    
        
        <tr>
            <td class="span2">
                <strong>Address:</strong>
            </td>
            <td>
            <?php echo $qu->address ?>
            </td>
            <td class="span2">
                <strong>Address:</strong>
            </td>
            <td>
            <?php echo $qu->address_r ?>
            </td>
        </tr>   
        
        <tr>
            <td colspan="4">
                <h3>Details</h3>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Item Code:</strong>
            </td>
            <td >
              <?php echo strtoupper($qu->item_code) ?>
            </td>
            <td>
                <strong>Specifics:</strong>
            </td>
            <td>
                <ul>
                    <li>
                <?php 
                if($qu->delivery_type == 1) {
                    echo 'Ordinary Delivery';
                }
                else if($qu->delivery_type == 2) {
                    echo 'Rushed Delivery';
                }

                ?></li>
                <?php
                    if($qu->delivery_type == 2) {
                        if($qu->transmit_time == 1) {
                            echo '<li>Same day</li>';
                        }
                        else if($qu->transmit_time == 2 ) {
                            echo '<li>Next day</li>';
                        }
                    }
                    else if($qu->delivery_type ==1) {
                        echo '<li>2-3 days</li>';
                    }


                ?>

                <li>
                    <?php
                    if($qu->area_r == 1) {
                        echo 'Metro Manila Area';
                    }
                    else if($qu->area_r == 2) {
                        echo 'Luzon Area';
                    }
                    else if($qu->area_r == 3) {
                        echo 'Visayas Area';
                    }
                    else if($qu->area_r == 4) {
                        echo 'Mindanao Area';
                    }
                    ?>
                </li>
                
                <?php
                if($qu->weight == 1) {
                    echo '<li>Mail</li>';
                }
                else if($qu->weight == 2) {
                    echo '<li>';
                   echo 'Small(up to 500kg)';
                   echo '</li>';
                }
                else if($qu->weight == 3) {
                    echo '<li>';
                    echo 'Medium(500g to 2kg)';
                    echo '</li>';
                }
                else if($qu->weight == 4) {
                    echo '<li>';
                    echo 'Large(2kg to 3kg)';
                    echo '</li>';
                }
                else if($qu->weight == 5) {
                    echo '<li>';
                    echo 'Cargo(1st 3 kilos)';
                    echo ' + ';
                    echo $qu->add;
                    echo 'kg';
                    echo '</li>';
                }
                ?>
                <?php
                if($qu->box == 1) {

                    echo '<li>Boxed</li>';
                }
                ?>

                <?php
                if(isset($wgt) !== false) {
                if($wgt == 1) {
                    echo '<li>';
                    echo 'Small(';
                    echo round($kg);
                    echo 'kg)</li>';
                }
                else if($wgt == 2) {
                    echo '<li>';
                    echo 'Medium(';
                    echo round($kg);
                    echo 'kg)</li>';
                
                }
                else if($wgt == 3) {
                    echo '<li>Large(';
                    echo round($kg);
                    echo 'kg)</li>';
                }
                else if($wgt == 4) {
                    echo '<li>Cargo(';
                    echo $wgt;
                    echo (' + ');
                    echo 'kg)</li>';
                }

                echo '</ul>';
                }
                
                
                
                
                ?>
                <?php if($qu->valuable == 1) {
                    echo '<li>Valuable Fee</li>';
                }
                ?>
                
                </ul>

            </td>
        </tr>
        <tr>
            <td>
                <strong>Description:</strong>
            </td>
            <td>
              <?php echo $qu->description ?>
            </td>
            <td>
                <strong>Price:</strong>
            </td>
            <td>
                <h3 class="text-info" style="margin:0px;">Php <?php echo $price ?></h3>
            </td>

            
        </tr>
        
    </table>
        </div>
    <div class="span3">
        <a class="btn btn-primary" href="<?php echo base_url();?>admin">Confirm</a>
        <a class="btn btn-primary" href="#" onclick="window.print();return false;">Print</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>admin/single_print_cancel" onclick="return confirm('Are you sure want to cancel?');">Cancel</a>
        
    </div>
</div>
