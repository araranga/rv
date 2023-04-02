<?php include("dashboard/connect.php"); ?>
<?php include("dashboard/function.php"); ?>
<?php

  $search = $_REQUEST['searchword'];
  $q = mysql_query_md("SELECT * FROM `content_v2` WHERE (catid=11 OR catid=10) AND (title LIKE '%{$_REQUEST['searchword']}%' OR introtext LIKE '%{$_REQUEST['searchword']}%') ORDER BY `content_v2`.`publish_up` DESC LIMIt 5");
  $news_count = 0;
  $result = array();

  while($row=mysql_fetch_md_array($q))
  {
	  
	  
	if($row['catid']==10){
		$url = "/articles/".$row['alias'];
	}
	
	if($row['catid']==11){
		$url = "/reviews/".$row['alias'];
	}
	$articledesc =  substr_replace(strip_tags($row['introtext']), "...", 150);	
	
	$resultdata['title'] = $row['title'];
	$resultdata['url'] = $url;
	$resultdata['text'] = $articledesc;
	
	
	$result['results'][] = $resultdata;
		
	
  }
	
	$result['count'] = 5;
	$result['error'] = NULL;
	
echo json_encode($result);	 
?>