<?php include("dashboard/connect.php"); ?>
<?php include("dashboard/function.php"); ?>
<?php
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$mvc = array_filter(explode("/",$uri_parts[0]));
$_GET['mvc'] = implode("/",$mvc);

$get_alias = explode("/",$_GET['mvc']);
$_GET['alias_url'] = $get_alias[1];

$breadcrumbs = array();
if(empty($_GET['mvc'])){
	
	$_GET['mytitle'] = "Home";
	

}else{
	
	
	if($get_alias[0]!='cms'){
	$breadcrumbs[] = array('url'=>'/'.$get_alias[0],'name'=>ucwords(str_replace("-"," ",$get_alias[0])));
	}
	
	
	if(count($get_alias)==1){
		$_GET['mytitle'] =  ucwords(str_replace("-"," ",$get_alias[0]));
		
	}
	if(count($get_alias)==2){
		if($get_alias[0]=='articles' || $get_alias[0]=='reviews'){
				$query = "SELECT * FROM content_v2 WHERE alias = '{$_GET['alias_url']}'";
				$q = mysql_query_md($query);
				$row=mysql_fetch_md_array($q);		

			$_GET['mytitle'] =  ucwords(str_replace("-"," ",htmlentities($row['title'])));	
			
			$breadcrumbs[] = array('url'=>'/'.$get_alias[0].'/'.$get_alias[1],'name'=>$row['title']);
		}
		
		if($get_alias[0]=='cms'){
				$query = "SELECT * FROM tbl_cms WHERE alias = '{$_GET['alias_url']}'";
				$q = mysql_query_md($query);
				$row=mysql_fetch_md_array($q);		

			$_GET['mytitle'] =  ucwords(str_replace("-"," ",htmlentities($row['pagetitle'])));	
			$breadcrumbs[] = array('url'=>'/'.$get_alias[0].'/'.$get_alias[1],'name'=>$row['pagetitle']);
		}
		
	

		if($get_alias[0]=='arts'){

				$query = "SELECT * FROM joomgallery_catg WHERE alias = '{$_GET['alias_url']}'";
				$q = mysql_query_md($query);
				$row=mysql_fetch_md_array($q);		
			unset($breadcrumbs[0]);
			$_GET['mytitle'] =  ucwords(str_replace("-"," ",htmlentities($row['name'])));	
			$breadcrumbs[] = array('url'=>'/'.$get_alias[0].'/'.$get_alias[1],'name'=>$row['name']);
		}	



		if($get_alias[0]=='gallery'){

$query = "SELECT * FROM joomgallery WHERE alias = '{$_GET["alias_url"]}'";
$q = mysql_query_md($query);
$row_art = mysql_fetch_md_array($q);
$catid = $row_art['catid'];

$query = "SELECT * FROM joomgallery_catg WHERE cid = '$catid'";
$q = mysql_query_md($query);
$row_art_cat = mysql_fetch_md_array($q);	


				
			unset($breadcrumbs[0]);
			$breadcrumbs[] = array('url'=>'/arts/'.$row_art_cat['alias'],'name'=>$row_art_cat['name']);
			$_GET['mytitle'] =  ucwords(str_replace("-"," ",htmlentities($row_art['imgtitle'])));	
			$breadcrumbs[] = array('url'=>'/'.$get_alias[0].'/'.$get_alias[1],'name'=>$row_art['imgtitle']);
		}


		
		
	}
}


?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
  <?php include("temp/head.php"); ?>
  <body id="page" class="page sidebar-a-left sidebars-1  sidebar-a-fixed sidebar-white separator-main noblog " data-config="{&quot;template_width&quot;:&quot;980&quot;,&quot;block_side_width&quot;:25,&quot;menu-follower&quot;:1,&quot;twitter&quot;:0,&quot;plusone&quot;:0,&quot;facebook&quot;:0}" data-new-gr-c-s-check-loaded="14.1100.0" data-gr-ext-installed="" style="zoom: 1;">
    <div class="wrapper grid-block">
	  <?php include("temp/menu-side.php"); ?>
      <div id="block-main" class="grid-box">
		<?php include("temp/mid-head.php"); ?>
        <div id="main" class="grid-block">
          <div id="maininner" class="grid-box">
            <section id="breadcrumbs">
              <div class="breadcrumbs">
                <a href=''>Home</a>
				<?php 
					$countbc = 0;
					$countlast = count($breadcrumbs);
					foreach($breadcrumbs as $bc){
						$countbc++;
						
						if($countbc==$countlast){
						?>
						<strong><?php echo $bc['name'];?></strong>
						<?php
						}else{
						?>
						<a href='<?php echo $bc['url'];?>'><?php echo $bc['name'];?></a>
						<?php
						}
					}
				?>
              </div>
            </section>
            <section id="content" class="grid-block">       
			<?php include("temp/inner-search.php"); ?>	

			
			

				
            </section>

			<?php
				if(empty($_GET['mvc'])){

					include("pages/home.php");
				}else{
					
					
					$url_array = explode("/",$_GET['mvc']);
					
					$url1 = $url_array[0];
					$url2 = $url_array[1];
					
					if(empty($url2)){
						$pages = "pages/".$url1.".php";
						include($pages);
					}else{
						$pages = "pages/".$url1."-view.php";
						include($pages);
					}
					
					if(!file_exists($pages)){
						
						echo $pages." not exist";
					}
					
				}
			?>



          </div>
          <!-- maininner end -->
        </div>
        <!-- main end -->
		<?php include("temp/footer.php"); ?>
		
		<br style='clear:both;'/>
      </div>
    </div>

  </body>

</html>