<div class="span9">


<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>admin/filemanager/home">File Maintenance</a> <span class="divider">/</span></li>
    <li class="active">Client</li>
</ul>

<?php echo form_open('admin/filemanager/client') ?>
<h4>Add Client</h4>
<div class="row">
<div class="span3" style="text-align:right;">
    <?php echo form_input('company_name', set_value('company_name'), 'id="company_name" placeholder="Company Name"'); ?>
    <span class="text-error"><small><?php echo form_error('company_name'); ?></small></span>

    <?php echo form_input('company_code', set_value('company_code'), 'id="company_code" placeholder="Company Code" class="input-medium"'); ?>
    <span class="text-error"><small><?php echo form_error('company_code'); ?></small></span>


</div>
<div class="span3">
    <?php echo form_input('branch', set_value('branch'), 'id="branch" placeholder="Branch"') ?>
    <span class="text-error"><small><?php echo form_error('branch'); ?></small></span>
    <hr/>
    
    <?php echo form_input('street_address',set_value('street_address'),'placeholder="Street Address"'); ?>
    <small><span class="text-error"><?php echo form_error('street_address')    ?></span></small>
    <?php echo form_input('city_address',set_value('city_address'),'placeholder="City"'); ?>
    <small><span class="text-error"><?php echo form_error('city_address')    ?></span></small>
    <?php echo form_input('state_address',set_value('state_address'),'placeholder="State/Province"'); ?>
    <small><span class="text-error"><?php echo form_error('state_address')    ?></span></small>
</div>
<div class="span3" style="text-align:right;">
    <?php
    echo '<div class="input-prepend"><span class="add-on">#</span>';
    echo form_input('contact_number',set_value('contact_number'), 'id="contact_number" class="span2" placeholder="Contact Number"');
    echo '</div>';
    ?>
    <span class="text-error"><small><?php echo form_error('contact_number'); ?></small></span>

    <br/>
    <hr />
    <?php echo form_submit('submit','Save','class="btn btn-primary"'); ?>
</div>


</div>
<?php echo form_close(); ?>
<?php if($rows !== false): ?>
<table class="table table-bordered table-striped table-hover ">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Name
        </th>
        <th>
            Code
        </th>
        <th>
            Branch
        </th>
        <th>
            Address
        </th>
        <th>
            Contact #
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
            <?php echo $row->company_name; ?>
        </td>
        <td>
            <?php echo $row->company_code; ?>
        </td>
        <td>
            <?php echo $row->branch; ?>
        </td>
        <td>
            <?php echo $row->address; ?>
        </td>
        <td>
            <?php echo $row->contact_number; ?>
        </td>
        <td>
            <a href="<?php echo base_url(); ?>admin/client_delete/<?php echo $row->id; ?>" onclick="return confirm('Are you sure want to delete?');"><i class="icon-remove"></i></a>
        </td>
    </tr>
<?php endforeach; ?>
</table>

<?php endif; ?>



</div>