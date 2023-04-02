<div class="gallery">
  <div class="jg_back">
    <a href="/"> Back to Gallery Overview</a>
  </div>
  <div class="jg_topview">
    <div class="sectiontableheader"> Top 10 last added artwork &nbsp; </div> 
	
<?php
$query = "SELECT a.*,b.name as catname,b.alias as catalias FROM joomgallery as a LEFT JOIN joomgallery_catg as b ON a.catid=b.cid ORDER by a.imgdate DESC LIMIT 10";
$q = mysql_query_md($query);

	
	while($row = mysql_fetch_md_array($q)){

?>


<div class="jg_row sectiontableentry1">
      <div class="jg_topelement">
        <div class="jg_topelem_photo">
          <a title="<?php echo strip_tags($row['imgtitle']); ?>" href="/gallery/<?php echo $row['alias']; ?>">
            <img src="/dashboard/uploads/<?php echo $row['imgfilename'];?>" class="jg_photo" alt="<?php echo strip_tags($row['imgtitle']); ?>">
          </a>
        </div>
        <div class="jg_topelem_txt">
          <ul>
            <li>
              <b><?php echo strip_tags($row['imgtitle']); ?></b>
            </li>
            <li> Category <a href="/arts/<?php echo strip_tags($row['catalias']); ?>"> <?php echo strip_tags($row['catname']); ?> </a>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="jg_clearboth"></div>
    </div> 
<hr>	
<?php
	}
?>
  </div>
  <div class="sectiontableheader"> &nbsp; </div>
</div>

<style>
img.jg_photo {
    width: 150px;
}
</style>