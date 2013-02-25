<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/smoothness/jquery-ui-1.8.23.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/print.css" media="print" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.23.custom.min.js" /></script>
<script type="text/javascript" src="<?php echo base_url();?>js/js.js" /></script>
   <script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
</head>

<body>
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
            <h2>OFFICIAL RECEIPT</h2>
        </div>
    </div>

    <div class="row">
        <div class="span9">

            <b>Client:</b> <?php echo $details->client_name ?><br/>
        </div>
        <div class="span3">
            <emp>SN:</emp><b><?php echo strtoupper($details->ref_number); ?> </b>
            <br/>
            Date: <?php echo $details->pickup_date; ?>

        </div>
    </div>
    <?php $tprice = 0 ;?>

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
                <?php if($current !== false): ?>
                <?php foreach($current as $row): ?>

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
                        <?php $tprice = $tprice + $row->price; ?>
                    </td>
                </tr>

                <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td colspan="3" class="row" align="right">
                        <b>Total: <span class="text-error">P<?php echo $tprice; ?> .00</span> &nbsp;&nbsp;&nbsp;&nbsp;</b>

                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<div class="container">
    <div class="row page-header">
    	<div class="span4">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" /></a>
        </div>
        

        <div class="btn-group" style="margin-top:75px; float:right;">
            <?php if($page == "home") {
                echo '<a href="';
                echo base_url();
                echo 'admin/home"class="btn btn-primary">Home</a>';
            }
            else {
                echo '<a href="';
                echo base_url();
                echo 'admin/home"class="btn">Home</a>';
            }
            
            if($page == "delivery") {
                echo '<a href="';
                echo base_url();
                echo 'admin/delivery"class="btn btn-primary">Delivery</a>';
            }
            else {
                echo '<a href="';
                echo base_url();
                echo 'admin/delivery"class="btn">Delivery</a>';
            }
            
            
            if($page == "reports") {
                echo '<a href="';
                echo base_url();
                echo 'admin/reports"class="btn btn-primary">Reports</a>';
            }
            else {
                echo '<a href="';
                echo base_url();
                echo 'admin/reports"class="btn">Reports</a>';
            }
            //
            if($page == "filemanager") {
                echo '<a href="';
                echo base_url();
                echo 'admin/filemanager/home"class="btn btn-primary">File Maintenance</a>';
            }
            else {
                echo '<a href="';
                echo base_url();
                echo 'admin/filemanager/home"class="btn">File Maintenance</a>';
            }

            echo '<a href="';
            echo base_url();
            echo 'home" class="btn btn-inverse">Front Page</a>';
            
            echo '<a href="';
            echo base_url();
            echo 'admin/logout" class="btn btn-danger">Log Out</a>';
            ?>
            
            
            

        </div>
    </div>