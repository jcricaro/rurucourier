<div class="print">
    <div class="row">
        <div class="span2 offset1">
            <img src="<?php echo base_url(); ?>img/print.png" width="150" height="150" />
        </div>
        <div class="span7" style="text-align:center;">
            <h1>RURU COURIER SYSTEMS, INC.</h1>
            <h4>"Guaranteed same day delivery. Up to 50% lower rate."</h4>
            <p>692 JP Rizal Street, Brgy. Valenzuela, 1223 Makati City<br/>
            Tel No. (632) 496-2033, 896-7226 * Email address: rurucourier@gmail.com</p>
            <h2>INVOICE RECEIPT</h2>
        </div>
    </div>

    <div class="row">
        <div class="span9">
            <b>Client:</b> <?php echo $details->client_name ?><br/>
            <b>Address:</b> <?php echo $details->address; ?><br/>
            <b>Tel. Numbers:</b> <?php echo $details->contact_number; ?>
        </div>
        <div class="span3">
            <emp>SN:</emp><b><?php echo strtoupper($details->ref_number); ?> </b>
            <br/>
            Date: <?php echo $details->date; ?>

        </div>
    </div>


    <div class="row">
        <div class="span12">
            <br/>
<table class="span12" border="1">
                <tr>
                    <td align="center" class="span2">
                        <b>Quantity</b>
                    </td>
                    <td align="center" class="span8">
                        <b>Particulars</b>
                    </td>
                    <td align="center" class="span2">
                        <b>Sub Total</b>
                    </td>
                </tr>
                <?php if($rows !== false): ?>
                <?php foreach($rows as $row): ?>

                <tr>
                    <td height="100" valign="top" align="center" style="padding:10px;">
                        1
                    </td>
                    <td style="padding:10px;">
                <ul>
                            <li>To: <?php echo $row->last_name ?>, <?php echo $row->first_name ?>
                            </li>
                 
                
                <?php
                if($row->weight == 1) {
                    echo '<li>';
                   echo 'Small(up to 500kg)';
                   echo '</li>';
                }
                else if($row->weight == 2) {
                    echo '<li>';
                    echo 'Medium(500g to 2kg)';
                    echo '</li>';
                }
                else if($row->weight == 3) {
                    echo '<li>';
                    echo 'Large(2kg to 3kg)';
                    echo '</li>';
                }
                else if($row->weight == 4) {
                    echo '<li>';
                    echo 'Cargo(1st 3 kilos)';
                    echo ' + ';
                    echo $row->add;
                    echo 'kg';
                    echo '</li>';
                }
                ?>
                <?php
                if($row->box == 1) {

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

                }
                
                
                ?>
                <?php 
                if($row->description) {
                    echo '<li><b>Description: </b>'.$row->description.'</li>';
                }
                ?>
                
                </ul>
                        <ul>
                       <li>
                <?php 
                if($row->delivery_type == 1) {
                    echo 'Ordinary Delivery';
                }
                else if($row->delivery_type == 2) {
                    echo 'Rushed Delivery';
                }

                ?></li>
                <?php
                    if($row->delivery_type == 2) {
                        if($row->transmit_time == 1) {
                            echo '<li>Same day</li>';
                        }
                        else if($row->transmit_time == 2 ) {
                            echo '<li>Next day</li>';
                        }
                    }
                    else if($row->delivery_type ==1) {
                        echo '<li>2-3 days</li>';
                    }


                ?>

                <li>
                    <?php
                    if($row->area_r == 1) {
                        echo 'Metro Manila Area';
                    }
                    else if($row->area_r == 2) {
                        echo 'Luzon Area';
                    }
                    else if($row->area_r == 3) {
                        echo 'Visayas Area';
                    }
                    else if($row->area_r == 4) {
                        echo 'Mindanao Area';
                    }
                    ?>
                </li>
                    </ul>
                        
                    </td>
                    <td valign="top" style="padding:10px;" align="right">
                        <b>P </b><?php echo $row->price; ?>
                    </td>
                </tr>

                <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td colspan="3" class="row" align="right">
                        <b>Total: <span class="text-error">P <?php echo $tprice; ?>.00</span> &nbsp;&nbsp;&nbsp;&nbsp;</b>

                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>