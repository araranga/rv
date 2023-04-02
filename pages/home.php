<?php
  $q = mysql_query_md("SELECT name FROM joomgallery_catg");
  while($row=mysql_fetch_md_array($q))
  {
  

  }
  ?>

		
			<section id="content" class="grid-block">    
			  
             <div class="gallery">
                <a name="gallery"></a>
                <div class="sectiontableheader"> Categories </div>
                <div class="jg_row sectiontableentry1">
				
<?php
  $q = mysql_query_md("SELECT * FROM joomgallery_catg");
  while($row=mysql_fetch_md_array($q))
  {	


	  $rand = mysql_fetch_md_array(mysql_query_md("SELECT * FROM joomgallery WHERE catid ='{$row['cid']}' ORDER BY RAND() LIMIT 1"));
	  

		
	  ?>
                  <div class="jg_element_gal">
                    <div class="jg_imgalign_gal">
                      <div class="jg_photo_container">
                        <a title="For Your Art Collection" href="/arts/<?php echo $row['alias']; ?>">
                          <img src="/dashboard/uploads/<?php echo $rand['imgfilename']; ?>" class="jg_photo" width="100" height="100" alt="<?php echo strip_tags($row['name']); ?>">
                        </a>
                      </div>
                    </div>
                    <div class="jg_element_txt">
                      <ul>
                        <li>
                          <a href="/arts/<?php echo $row['alias']; ?>">
                            <b><?php echo $row['name']; ?></b>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>	  
	  <?php
  

  }
  ?>				
				

                  <div class="jg_clearboth"></div>
                </div>
                <div class="sectiontableheader"> &nbsp; </div>

              </div>	     
</section>			  

	   <section id="innerbottom" class="grid-block">
              <div class="grid-box width100 grid-h">
                <div class="module mod-box  deepest" style="min-height: 820px;">
                  <div class="aidanews2" style="clear: both;">

<?php
  $q = mysql_query_md("SELECT * FROM `content_v2` WHERE catid=10 ORDER BY `content_v2`.`publish_up` DESC LIMIt 5");
  $news_count = 0;
  while($row=mysql_fetch_md_array($q))
  {	

	$news_count++;
	
	$articledate = date("m-d-Y h:i A",strtotime($row['publish_up']));
	
	$articledesc =  substr_replace(strip_tags($row['introtext']), "...", 150);
	

    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row['introtext'], $image);
    $img = $image['src'];	
	//$articledesc = implode(" ", explode(" ", strip_tags($row['introtext']), 20));
	
?>

                    <div class="aidanews2_art aidacat_10  <?php if($news_count % 2 == 0){ echo "even"; } else { echo "odd"; }?>" style="clear: both;">
                      <div class="aidanews2_positions">
                        <div class="aidanews2_head" style="clear: both;">
                          <h1 class="aidanews2_title">
                            <a href="/articles/<?php echo $row['alias']; ?>"><?php echo $row['title']; ?></a>
                          </h1>
                        </div>
                        <div class="aidanews2_top" style="clear: both;">
                          <div class="aidanews2_topL">Written on <span class="aidanews2_date"><?php echo $articledate; ?></span>
                          </div>
                          <div style="clear: both; width: 100%; padding: 0;"></div>
                        </div>
                        <div class="aidanews2_main" style="clear: both;">
                          <div class="aidanews2_mainC">
                            <a class="aidanews2_img1" href="articles/65-news">
							  <?php if(!empty($img)) { ?>
                              <img src="<?php echo $img; ?>" height="100" alt="news">
							  <?php } else { ?>
							  <img src="/Home_files/aidadefault1.jpg" height="100" alt="news">
							  <?php } ?>
                            </a>
                            <span class="aidanews2_text">
							<?php echo $articledesc; ?>
							</span>
                          </div>
                        </div>
                        <div class="aidanews2_bot" style="clear: both;">
                          <div class="aidanews2_botR">
                            <a href="/articles/<?php echo $row['alias']; ?>" class="readon">
                              <span class="aidanews2_readmore">Read More</span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="aidanews2_line" style="clear: both; padding: 0;"></div>
                    </div>
<?php
  }
?>
                  </div>
                  <div style="clear: both;"></div>
                </div>
              </div>
            </section>