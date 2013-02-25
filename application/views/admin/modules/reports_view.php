


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
            <?php echo $first_name ?> <?php echo $middle_name ?> <?php echo $last_name ?>
            </td>
            <td class="span2">
                <strong>Name:</strong>
            </td>
            <td>
            <?php echo $first_name_r ?> <?php echo $middle_name_r ?> <?php echo $last_name_r ?>
            </td>
        </tr>    
        
        <tr>
            <td class="span2">
                <strong>Contact Number:</strong>
            </td>
            <td>
            <?php echo $contact_number ?>
            </td>
            <td class="span2">
                <strong>Contact Number:</strong>
            </td>
            <td>
            <?php echo $contact_number_r ?>
            </td>
        </tr>    
        
        <tr>
            <td class="span2">
                <strong>Address:</strong>
            </td>
            <td>
            <?php echo $address ?>
            </td>
            <td class="span2">
                <strong>Address:</strong>
            </td>
            <td>
            <?php echo $address_r ?>
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
              <?php echo strtoupper($item_code) ?>
            </td>
            <td>
                <strong>Specifics:</strong>
            </td>
            <td>
                <ul>
                    <li>
                <?php 
                if($delivery_type == 1) {
                    echo 'Ordinary Delivery';
                }
                else if($delivery_type == 2) {
                    echo 'Rushed Delivery';
                }

                ?></li>
                <?php
                    if($delivery_type == 2) {
                        if($transmit_time == 1) {
                            echo '<li>Same day</li>';
                        }
                        else if($transmit_time == 2 ) {
                            echo '<li>Next day</li>';
                        }
                    }
                    else if($delivery_type ==1) {
                        echo '<li>2-3 days</li>';
                    }


                ?>

                <li>
                    <?php
                    if($area_r == 1) {
                        echo 'Metro Manila Area';
                    }
                    else if($area_r == 2) {
                        echo 'Luzon Area';
                    }
                    else if($area_r == 3) {
                        echo 'Visayas Area';
                    }
                    else if($area_r == 4) {
                        echo 'Mindanao Area';
                    }
                    ?>
                </li>
                
                <?php
                if($weight == 1) {
                    echo '<li>';
                   echo 'Small(up to 500kg)';
                   echo '</li>';
                }
                else if($weight == 2) {
                    echo '<li>';
                    echo 'Medium(500g to 2kg)';
                    echo '</li>';
                }
                else if($weight == 3) {
                    echo '<li>';
                    echo 'Large(2kg to 3kg)';
                    echo '</li>';
                }
                else if($weight == 4) {
                    echo '<li>';
                    echo 'Cargo(1st 3 kilos)';
                    echo ' + ';
                    echo $add_weight;
                    echo 'kg';
                    echo '</li>';
                }
                ?>
                <?php
                if($box == 1) {

                    echo '<li>Boxed</li>';
                }
                ?>

                <?php
                if(isset($wgt) !== false) {
                if($wgt == 1) {
                    echo '<li>';
                    echo 'Small(';
                    echo $kg;
                    echo ')</li>';
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
                    echo $add;
                    echo 'kg)</li>';
                }

                echo '</ul>';
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
              <?php echo $description ?>
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
        <a class="btn btn-primary btn-large" href="#" onclick="window.print();return false;">Reprint</a>
        <a class="btn btn-danger btn-large" href="<?php echo base_url();?>admin/reports_delete/<?php echo $id ?>">Delete</a>
        
    </div>
</div>
