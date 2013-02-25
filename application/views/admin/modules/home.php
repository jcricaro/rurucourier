
<div class="row">
    <div class="span9">
        <div class="well">
        <h3>Welcome to admin panel!</h3>
        You are logged in as a/an <b><?php echo ($_SESSION['usertype'] == 1) ? 'Admin' : '' ;?><?php echo ($_SESSION['usertype'] == 2) ? 'Dispatch' : '' ;?><?php echo ($_SESSION['usertype'] == 3) ? 'Encoder' : '' ;?>.</b>
        </div>
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
    </div>
</div>