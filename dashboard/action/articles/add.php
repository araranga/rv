<?php
$sdata = array();
$field[] = array("type"=>"text","value"=>"title","label"=>"Title");
$field[] = array("type"=>"text","value"=>"alias","label"=>"Alias");
$field[] = array("type"=>"editor","value"=>"introtext","label"=>"Intro Text");

?>
<h2>Articles Management</h2>


<div class="panel panel-default">
   <div class="panel-body">
      <form method='POST' action='?pages=<?php echo $_GET['pages'];?>'>
	  <input type='hidden' name='catid' value='10'>
	  <input type='hidden' name='task' value='<?php echo $_GET['task'];?>'>
        <?php echo loadform($field,$sdata); ?>
         <center><input class='btn btn-primary btn-lg' type='submit' name='submit' value='<?php echo ucwords($_GET['task']);?>'></center>
      </form>
   </div>
</div> 


