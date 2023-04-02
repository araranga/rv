<?php
$primary = "id";
$pid = $_GET['id'];
$tbl = "tbl_files";
$query  = mysql_query_md("SELECT * FROM $tbl WHERE $primary='$pid'");
while($row=mysql_fetch_md_assoc($query))
{
	foreach($row as $key=>$val)
	{
		$sdata[$key] = $val;
	}
}
$field[] = array("type"=>"text","value"=>"pagetitle","label"=>"Page Name");
$field[] = array("type"=>"editor","value"=>"pagecontent","label"=>"Page Content");
$field[] = array("type"=>"text","value"=>"alias","label"=>"URL Alias");
?>
<h2>Are you sure you want to delete? - <?php echo $sdata['remarks']; ?></h2>
<div class="panel panel-default">
   <div class="panel-body">
   	  Download here: <a href='<?php echo $sdata['link']; ?>'>Click here</a>
      <form method='POST' action='?pages=<?php echo $_GET['pages'];?>'>
	  <input type='hidden' name='task' value='<?php echo $_GET['task'];?>'>
	  <input type='hidden' name='<?php echo $primary; ?>' value='<?php echo $sdata[$primary];?>'>
         <?php echo loadform($field,$sdata,0); ?>
         <center><input class='btn btn-primary btn-lg' type='submit' name='submit' value='<?php echo ucwords($_GET['task']);?>'></center>
      </form>
   </div>
</div> 
