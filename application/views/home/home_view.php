
<?php echo form_open('home/index'); ?>
<div class="row">

	<div class="span9">
    <!--
    <h1>About Us</h1>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
    
    <blockquote class="pull-right">
    <p>
    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
    </p>
    <small><cite title="Proud Customer">Proud Customer</cite></small>
    </blockquote>
    -->
    <?php echo $content->home ?>


<?php if($feedbacks !== false): ?>
<h2>Feedbacks:</h2>
<?php foreach($feedbacks as $row): ?>
<blockquote>
  <p><?php echo $row->comment; ?></p>
  <small><?php echo $row->author; ?></small>
</blockquote>
<?php endforeach; ?>
<?php endif; ?>

    
    </div>
    <div class="span3">
    <h2>Status Check</h2>
    <h4>Referrence no.</h4>

    <div class="input-prepend"><span class="add-on">#</span><?php echo form_input('ref_number','','id="ref_number" class="span2" size="16"'); ?></div>
    <small><span class="text-error"><?php echo form_error('ref_number'); ?></span></small>
    <?php echo form_label('Customer type:','search_type');?>
    <?php echo form_dropdown('search_type',array('Single','Company'),'','id="search_type" class="span2"'); ?>
    <br/>
    <?php echo form_submit('submit','Check','class="btn btn-primary"'); ?>

    </div>
</div>
<?php echo form_close() ?>