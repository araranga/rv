<section id="content" class="grid-block">
<div id="system">
  <form class="box style" id="searchForm" action="/index.php" method="GET" name="searchForm">
    <fieldset>
      <legend>Search</legend>
      <div>
        <label for="search_searchword">Search Keyword:</label>
        <input type="text" name="searchword" id="search_searchword" size="30" maxlength="20" value="<?php echo $_GET['searchword']; ?>" class="inputbox">
        <input type="hidden" name="mvc" value="mainsearch">
        <button name="Search" onclick="this.form.submit()" class="button">Search</button>
      </div>
    </fieldset>
    <input type="hidden" name="task" value="search">
  </form>
  <div class="items">
  
<?php
  $q = mysql_query_md("SELECT * FROM `content_v2` WHERE (catid=11 OR catid=10) AND (title LIKE '%{$_REQUEST['searchword']}%' OR introtext LIKE '%{$_REQUEST['searchword']}%') ORDER BY `content_v2`.`publish_up` DESC");
  $news_count = 0;
  while($row=mysql_fetch_md_array($q))
  {	

	$news_count++;
	
	$articledate = "Created on ".date("d F Y",strtotime($row['publish_up']));
	
	$articledesc =  substr_replace(strip_tags($row['introtext']), "...", 300);
	
	if($row['catid']==10){
		$url = "/articles/".$row['alias'];
	}
	
	if($row['catid']==11){
		$url = "/reviews/".$row['alias'];
	}	

	
?>  
  
    <article class="item">
      <header>
        <h1 class="title">
          <a href="<?php echo $url; ?>"><?php echo ucwords($row['title']); ?></a>
        </h1>
        <p class="meta"><?php echo $articledate; ?></p>
      </header>
      <div class="content clearfix">
        <?Php echo $articledesc; ?>
      </div>
    </article>
	
  <?php
  }
  
  ?>
	
	
	
  </div>
  </div>
</section>