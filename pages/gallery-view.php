  <script src="/Home_files/slimbox.js" type="text/javascript"></script>
  <script src="/Home_files/motiongallery.js" type="text/javascript"></script>
  <script src="/Home_files/detail.js" type="text/javascript"></script>
  <link rel="stylesheet" href="/Home_files/slimbox.css" type="text/css" />
  <script type="text/javascript">
    var resizeJsImage = 1;
    var resizeSpeed = 5;
    var joomgallery_image = "Image";
    var joomgallery_of = "of";

    function joom_startslideshow() {
      document.jg_slideshow_form.submit();
    }
    document.onkeydown = joom_cursorchange;
    /***********************************************
     * CMotion Image Gallery- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
     * Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
     * This notice must stay intact for legal use
     * Modified by Jscheuer1 for autowidth and optional starting positions
     ***********************************************/
  </script>

<?php
$query = "SELECT * FROM joomgallery WHERE alias = '{$_GET["alias_url"]}'";
$q = mysql_query_md($query);
$row_art = mysql_fetch_md_array($q);
$catid = $row_art['catid'];

$query = "SELECT * FROM joomgallery_catg WHERE cid = '$catid'";
$q = mysql_query_md($query);
$row_art_cat = mysql_fetch_md_array($q);

?>
  <section id="content" class="grid-block">
    <div id="system-message-container"></div>
    <div class="gallery">
      <div class="jg_back">
        <a href="/arts/<?php echo $row_art_cat['alias']; ?>"> Back to Category Overview</a>
      </div>
      <a name="joomimg"></a>
      <div>
        <h3 class="jg_imgtitle" id="jg_photo_title"> <?php echo $row_art['imgtitle']; ?> </h3>
      </div>
      <div class="jg_displaynone"></div>
      <div id="jg_dtl_photo" class="jg_dtl_photo" style="text-align:center;">
        <a title="<?php echo strip_tags($row_art['imgtitle']); ?> - <?php echo strip_tags($row_art['imgtext']); ?>" id="jg_photo_bigjq" href="/dashboard/uploads/<?php echo $row_art['imgfilename']; ?>" rel="lightbox[joomgallery]">
          <img src="/dashboard/uploads/<?php echo $row_art['imgfilename']; ?>" class="jg_photo" id="jg_photo_big" width="322" height="400" alt="<?php echo strip_tags($row_art['imgtitle']); ?>" />
        </a>
		
		
		
<?php

$pagination = array();
$query = "SELECT * FROM joomgallery WHERE catid = '{$catid}' ORDER by id ASC";
$q = mysql_query_md($query);

	
	while($rowd = mysql_fetch_md_array($q)){
		
	$pagination[] = $rowd['alias'];	
		
	if($rowd['alias']!=$_GET['alias_url']) {
?>  			
        <a style='display:none;' title="<?php echo strip_tags($rowd['imgtitle']); ?> - <?php echo strip_tags($rowd['imgtext']); ?>" href="/dashboard/uploads/<?php echo $rowd['imgfilename']; ?>" rel="lightbox[joomgallery]"><?php echo $rowd['id']; ?></a>
		
 
<?php
	}
	
	}
	
	
	$curr = array_search ($_GET['alias_url'], $pagination);
	$next = $pagination[$curr + 1];
	$prev = $pagination[$curr - 1];
	

	
?>			
		
		
		
		
		
		
		
      </div>
      <script type="text/javascript">
        //document.getElementById('jg_displaynone').className = 'jg_detailnavislide';
        //document.getElementById('jg_detailnavislide').className = 'jg_displaynone';
      </script>
      <div class="jg_detailnavi">
	  
	  
		
        <div class="jg_detailnaviprev">
		<?php if(!empty($prev)) { ?>
          <a href="/gallery/<?php echo $prev; ?>">
            <img src="/images/arrow_left.png" alt="Previous" class="pngfile jg_icon">
          </a>
          <a href="/gallery/<?php echo $prev; ?>"> Previous</a>
		<?php } else { echo " &nbsp;"; } ?>
        </div>
		
        <div class="jg_iconbar">
          <a href='javascript:void(0)' onclick="jQuery('.jg_photo').trigger('click');">
            <img src="/images/zoom.png" alt="View full size" class="pngfile jg_icon">
          </a>
        </div>
		
		
        <div class="jg_detailnavinext">
		<?php if(!empty($next)) { ?>
          <a href="/gallery/<?php echo $next; ?>">Next</a>
          <a href="/gallery/<?php echo $next; ?>">
            <img src="/images/arrow_right.png" alt="Next" class="pngfile jg_icon">
          </a>
		 <?php } else { echo " &nbsp;"; } ?>
        </div>
		
      </div>
      <div class="jg_minis">
        <div id="motioncontainer">
          <div id="motiongallery">
            <div style="white-space:nowrap;" id="trueContainer">
<?php
$query = "SELECT * FROM joomgallery WHERE catid = '{$catid}' ORDER by id ASC";
$q = mysql_query_md($query);

	
	while($rowd = mysql_fetch_md_array($q)){

?>  			
			
              <a title="<?php echo strip_tags($row['imgtitle']); ?>" href="/gallery/<?php echo $rowd['alias']; ?>">
                <img src="/dashboard/uploads/<?php echo $rowd['imgfilename']; ?>" <?php  if($rowd['alias']==$_GET['alias_url']) { echo "id='jg_mini_akt'"; } ?>  class="jg_minipic" alt="Red Nude" />
              </a>
 
<?php
	}
?>	
			
			</div>
          </div>
        </div>
      </div>
      <div class="jg_details">
        <div class="sectiontableheader">
          <h4> Art Description </h4>
        </div>
        <div class="sectiontableentry1">
          <div class="jg_photo_leftx"> Description </div>
          <div class="jg_photo_rightx">
            <p><?php echo ($row_art['imgtext']); ?></p>
          </div>
		  <br style='clear:both;'/>
        </div>
        <div class="sectiontableentry1">
          <div class="jg_photo_leftx"> Artist </div>
          <div class="jg_photo_rightx">
            <p>Roy Veneracion</p>
          </div>
		  <br style='clear:both;'/>
        </div>
      </div>
      <div class="sectiontableheader"> &nbsp; </div>
    </div>
  </section>
  <style>
.jg_photo_leftx {
    float: left;
    width: 10%;
    margin-top: 15px;
    margin-left: 17px;
    margin-right: 15px;
}

.jg_photo_rightx {
    float: left;
    width: 80%;
}
  </style>