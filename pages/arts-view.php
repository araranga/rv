<div id="system">

<?php
$query = "SELECT * FROM joomgallery_catg WHERE alias = '{$_GET["alias_url"]}'";
$q = mysql_query_md($query);
$row = mysql_fetch_md_array($q);

$cid = $row["cid"];
?>
</div>
<div class="gallery">
  
  <div class="jg_back">
    <a href="/">
      Back to Gallery Overview</a>
  </div>
  <div class="jg_category">
    <div class="sectiontableheader"><?php echo $row['name']; ?></div>
  </div>
 
  <div class="jg_row sectiontableentry1">
  
 
<?php
$query = "SELECT * FROM joomgallery WHERE catid = '{$cid}'";
$q = mysql_query_md($query);

	
	while($row = mysql_fetch_md_array($q)){

?>  
  
    <div class="jg_element_cat2">
      <div class="jg_imgalign_catimgs2">
        <a title="<?php echo strip_tags($row['imgtitle']); ?>" href="/gallery/<?php echo $row['alias']; ?>">
          <img src="/dashboard/uploads/<?php echo $row['imgfilename'];?>" class="jg_photo2" width="100" height="100" alt="<?php echo strip_tags($row['imgtitle']); ?>"></a>
      </div>
      <div class="jg_catelem_txt2">
        <b><?php echo $row['imgtitle']; ?></b>
      </div>
    </div>
<?php

	}

?>	
	
	
	
	
    <div class="jg_clearboth"></div>
  </div>
  <div class="sectiontableheader">
    &nbsp;
  </div>
  
</div>
<style>
.jg_element_cat2 {
    float: left;
    width: 25%;
    height: 171px;
    padding-top: 11px;
    overflow: hidden;
}
.jg_catelem_txt2 {
    text-align: center;
}

.jg_imgalign_catimgs2 {
    text-align: center;
}


@media only screen and (max-width: 600px) {
  .jg_element_cat2 {
    width: 100%;
  }

}
</style>