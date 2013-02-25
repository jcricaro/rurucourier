
<div class="container print">

	<div class="row">
		<div class="span2 offset1">
			<img src="<?php echo base_url(); ?>img/print.png" width="150" height="150" />
		</div>
		<div class="span8" style="text-align:center;">
			<h1>RURU COURIER SYSTEMS, INC.</h1>
			<h4>"Guaranteed same day delivery. Up to 50% lower rate."</h4>
			<p>692 JP Rizal Street, Brgy. Valenzuela, 1223 Makati City<br/>
			Tel No. (632) 496-2033, 896-7226 * Email address: rurucourier@gmail.com</p>
			<h2>INVOICE RECEIPT</h2>
		</div>
	</div>
	<div class="row">
		<div class="span9">
			<b>From:</b> <?php echo $qu->last_name ?>, <?php echo $qu->first_name; ?><br/>
			<b>Address:</b> <?php echo $qu->address; ?><br/>
			<b>Tel. Numbers:</b> <?php echo $qu->contact_number; ?><br/>
            <b>To:</b> <?php echo $qu->last_name_r ?>, <?php echo $qu->first_name_r; ?><br/>
            <b>Address:</b> <?php echo $qu->address_r; ?><br/>
            <b>Tel. Numbers:</b> <?php echo $qu->contact_number_r; ?>
		</div>
		<div class="span3">
			<emp>SN:</emp><b><?php echo strtoupper($qu->item_code); ?> </b>
			<br/>
			Date: <?php echo $qu->date; ?>

		</div>
	</div>
	<div class="row">
		<div class="span12">
			<br/>
			<table class="span11" border="1">
				<tr>
					<td align="center" class="span6">
						<b>Particulars</b>
					</td>
					<td align="center" class="span5">
						<b>Category of Delivery Service</b>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
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

                }
                
                
                ?>
                <?php 
                if(isset($qu->description) !== false) {
                	echo '<li><b>Description: </b>'.$qu->description.'</li>';
                }
                ?>
                
                </ul>
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
                    if($qu->valuable == 1) {
                        echo '<li>Valuable Fee</li>';
                    }
                ?>
					</ul>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="row" align="right">
						<b>Price: <span class="text-error">P <?php echo $price ?></span> &nbsp;&nbsp;&nbsp;&nbsp;</b>

					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
