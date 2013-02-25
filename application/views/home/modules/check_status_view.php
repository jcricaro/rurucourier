<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>home">Home</a> <span class="divider">/</span></li>
    <li class="active">Check Status</li>
</ul>

<div class="row">
	<div class="span8">
		<h2>Details:</h2>
		<table class="table">
			<tr>
				<td class="span1">
					<strong>Name:</strong>
				</td>
				<td class="span3">
					<?php echo $last_name; ?> , <?php echo $first_name; ?> <?php echo substr($middle_name, 0,1); ?>.
				</td>
				<td class="span1">
					<strong>Type:</strong>
				</td>
				<td class="span3">
					<?php
						if($delivery_type == 1) {
							echo 'Ordinary Delivery';
						}
						else if($delivery_type ==2) {
							echo 'Rushed Delivery';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Date:</strong>
				</td>
				<td>
					<?php 
					echo date('m-d-Y',strtotime($date));
					echo '<br/>';
					echo date('h:i',strtotime($date));
					if (date('H',strtotime($date)) >11) {
						echo ' pm';
					}
					else {
						echo ' am';
					}

					?>

				</td>
			</tr>


		</table>


	</div>
</div>

<div class="row">
	<div class="span12">
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
        <th class="span1">
            Price
        </th>
    </thead>

    <tr>
        <td>
            <strong><?php echo strtoupper($item_code); ?></strong>
        </td>
        <td>
            <?php echo $last_name; ?>, <?php echo $first_name; ?>
        </td>
        <td>
            <?php echo $contact_number; ?>
        </td>
        <td>
            <?php echo $address; ?>
        </td>
        <td>
            <ul>
                <li>
                    <?php 
                    if($area_r == 1){ 
                        echo 'Metro Manila';
                    } 
                    else if($area_r == 2){ 
                        echo 'Metro Manila 2';
                    } 
                    else if($area_r == 3){ 
                        echo 'Luzon';
                    } 
                    else if($area_r == 4){ 
                        echo 'Visayas';
                    }
                    else if($area_r == 5){ 
                        echo 'Mindanao';
                    } 
                    ?>
                </li>
                <li>
                    <?php
                    if($delivery_type == 1) {
                        echo 'Ordinary';
                    }
                    else if($delivery_type == 2) {
                        echo 'Rushed';
                    }
                    ?>
                </li>
                <?php
                    if($box == 1) {
                        echo '<li>Boxed</li>';
                    }
                ?>
                


            </ul>
        </td>
        <td>
            <b>P
                <?php echo $price; ?>
            </b>
        </td>
    </tr>

    <tr>
        <td colspan="5">
            Total:
        </td>
        <td colspan="2" class="text-error">
            <b>P <?php echo $price ?></b>
        </td>
    </tr>
</table>
</div>
</div>

