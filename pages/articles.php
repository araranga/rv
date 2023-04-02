<div id="system">

<?php

 $total = countquery("SELECT title FROM content_v2 WHERE catid = 10");
 //primary query
 $limit = getlimit(5,$_GET['p']);

 $query = "SELECT * FROM content_v2 WHERE catid = 10 ORDER by publish_up ASC $limit";

 $q = mysql_query_md($query);
 $pagecount = getpagecount($total,5);

  while($row=mysql_fetch_md_array($q))
  {	

	$news_count++;
	
	$articledate = "Created on ".date("d F Y",strtotime($row['publish_up']));
	
	$articledesc =  substr_replace(strip_tags($row['introtext']), "...", 500);
	
	if($row['catid']==10){
		$url = "/articles/".$row['alias'];
	}
	
	if($row['catid']==11){
		$url = "/reviews/".$row['alias'];
	}	


    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row['introtext'], $image);
    $img = $image['src'];
	
?>  
  <div class="grid-box width100">
    <article class="item" data-permalink="<?php echo $url; ?>">
      <header>
        <h1 class="title">
          <a href="<?php echo $url; ?>" title="<?php echo strip_tags($row['title']); ?>"><?php echo ($row['title']); ?></a>
        </h1>
      </header>
      <div class="content clearfix">
		<p>
		<?php if(!empty($img)) { ?>
		<img class='artiimg' src='<?php echo $img; ?>'/>
		<?php } ?>
		<?php echo $articledesc; ?>
		</p>
		
      </div>
	  <div style='width: 100%;margin-top:15px;'>
			<div style='margin: 0 auto;width: 120px;'>
				<a class='btnarc' href='<?php echo $url; ?>'>Read More</a>
			</div>
	  </div>
    </article>
	<hr>
  </div>
<?php 
  }
 ?>

  <div class="pagination">
                      <?php
                        for($c=1;$c<=$pagecount;$c++)
                        {
                          $active = '';

                          if($_GET['p']=='' && $c==1)
                          {
                            $active = 'active';
                          }
                          if($c==$_GET['p'])
                          {
                            $active = 'active';
                          }
                          $url = "?search=".$_GET['search']."&pages=".$_GET['pages']."&search_button=Submit&p=".$c;
                      ?>
						<a class="<?php echo $active; ?>" href="?p=<?php echo $c; ?>" title="<?php echo $c; ?>"><?php echo $c; ?></a>
	                      
						  <?php
						  
						}?>

  </div>
</div>

<style>
a.active {
    font-weight: 700;
}

.btnarc {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0px;
  font-family: Arial;
  color: #ffffff!important;
  font-size: 16px;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
.btnarc:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

img.artiimg {
    float: left;
    padding-right: 12px;
    width: 150px;
}

article.item {
    padding: 10px;
}
</style>