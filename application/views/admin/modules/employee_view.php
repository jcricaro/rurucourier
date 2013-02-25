<div class="span9">



<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>admin/filemanager/home">File Maintenance</a> <span class="divider">/</span></li>
    <li class="active">Employee</li>
</ul>






<?php echo form_open('admin/filemanager/employee'); ?>
<div class="row">
    <div class="span3">
        <h4>Personal information</h4>
        <hr/>
<?php echo form_input('last_name', set_value('last_name') , 'id="last_name" placeholder="Last Name"'); ?>
    <span class="text-error"><small><?php echo form_error('last_name'); ?></small></span>
<?php
    echo form_input('first_name', set_value('first_name') , 'id="first_name" placeholder="First Name"');
?>
    <span class="text-error"><small><?php echo form_error('first_name'); ?></small></span>
<?php echo form_input('middle_name',set_value('middle_name'), 'id="middle_name" placeholder="Middle Name"');
?>
<span class="text-error"><small><?php echo form_error('middle_name'); ?></small></span>



</div>
<div class="span3">
        <h4>Login Details</h4>
        <hr/>    
<?php
    echo form_input('user_name',set_value('user_name'), 'id="username" placeholder="Username"');
?>
    <span class="text-error"><small><?php echo form_error('user_name'); ?></small></span>
<br/>
<?php
    
    echo form_password('password', '','id="password" placeholder="Password"');
?>
    <span class="text-error"><small><?php echo form_error('password'); ?></small></span>
    <?php $dr = array(
        1 => 'Admin',
        2 => 'Dispatch',
        3 => 'Encoder'
    ); ?>
    
</div>
<div class="span3">
<h4>User Type</h4>
<hr/>
<?php echo form_dropdown('usertype',$dr,''); ?>
<br/>
<?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>




    </div>
<?php echo form_close(); ?>
</div>





<hr />






<table class="table table-striped table-hover table-bordered">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Name
        </th>        
        <th>
            Username
        </th>
        <th>
        </th>
        
    </tr>
    </thead>
<?php foreach($rows as $row): ?>
    <tr>
        <td>
            <?php echo $row->id; ?>
        </td>
        <td>
            <?php echo $row->last_name;?>, <?php echo $row->first_name; ?>, <?php echo $row->middle_name ?>
        </td>
        <td>
            <?php echo $row->user_name; ?>
        </td>
        <td>
            <a href="<?php echo base_url(); ?>admin/employee_delete/<?php echo $row->id?>"><i class="icon-remove" onclick="return confirm('Are you sure want to delete?');"></i></a>
        </td>
    </tr>
<?php endforeach; ?>
</table>


</div>

</div>