<?php echo form_open('admin'); ?>




<div class="row">
    <div class="span9" style="text-align:center;">
    <a href="<?php echo base_url();?>admin/single"><img src="<?php echo base_url(); ?>img/single.png" style="margin:20px;" /></a>
    <a href="<?php echo base_url();?>admin/job_order"><img src="<?php echo base_url(); ?>img/job.png" style="margin:20px;" /></a>
    </div>
    
    <div class="span3">
        
        <?php 
        echo $this->calendar->generate();
        $datestring = "%h:%i:%a";    
        $time = time();
        echo '<hr><i class="icon-calendar"></i>';
        echo mdate($datestring, $time); 
        ?>
        <br/>

        <h4>Completed Modules</h4>
        <ul>
            <li><a href="<?php echo base_url(); ?>admin/employee">Employee</a></li>
            <li><a href="<?php echo base_url(); ?>admin/single">Single Transaction</a></li>
        </ul>
    </div>
    </div>
     <?php echo form_close();?>