<?php
$pid = $_GET['id'];
$tbl = "joomgallery";
$primary = "id";
$query  = mysql_query_md("SELECT * FROM $tbl WHERE $primary='$pid'");
while($row=mysql_fetch_md_assoc($query))
{
	foreach($row as $key=>$val)
	{
		 $sdata[$key] = $val;
	}
}
$field[] = array("type"=>"text","value"=>"imgtitle","label"=>"Name");
$field[] = array("type"=>"text","value"=>"imgauthor","label"=>"Author");
$field[] = array("type"=>"text","value"=>"alias","label"=>"Alias");
$field[] = array("type"=>"editor","value"=>"imgtext","label"=>"Description");
$field[] = array("type"=>"number","value"=>"ordering","label"=>"Ordering");

$field[] = array("type"=>"file","value"=>"image","label"=>"Image","path"=>"uploads","filedata"=>"imgfilename","filetype"=>"image");


$complan = array();
$queryx  = mysql_query_md("SELECT * FROM joomgallery_catg");
$complan[0] = "Select a Category";
while($rows=mysql_fetch_md_assoc($queryx))
{

  $complan[$rows['cid']] = $rows['name'];
	
}

$field[] = array("type"=>"select","value"=>"catid","label"=>"Category","option"=>$complan);
?>
<h2>Arts Management</h2>
<div class="panel panel-default">
   <div class="panel-body">
      <form method='POST' action='?pages=<?php echo $_GET['pages'];?>' enctype="multipart/form-data">
	  <input type='hidden' name='task' value='<?php echo $_GET['task'];?>'>
	  <input type='hidden' name='<?php echo $primary; ?>' value='<?php echo $sdata[$primary];?>'>
         <?php echo loadform($field,$sdata); ?>
         <center><input class='btn btn-primary btn-lg' type='submit' name='submit' value='<?php echo ucwords($_GET['task']);?>'></center>
      </form>
   </div>
</div> 

