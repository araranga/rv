<div id="system">

<?php
  $query = "SELECT * FROM content_v2 WHERE alias = '{$_GET['alias_url']}'";
 $q = mysql_query_md($query);
 $row=mysql_fetch_md_array($q);
 
	if($row['catid']==10){
		$url = "/articles/".$row['alias'];
	}
	
	if($row['catid']==11){
		$url = "/reviews/".$row['alias'];
	} 
?>
<article class="item" data-permalink="<?php echo $url; ?>">

		
				<header>

											
							
								
			<h1 class="title"><?php echo $row['title']; ?></h1>

			
		</header>
			

<div class="content clearfix">

		<?php echo str_replace('"images','"/images',$row['introtext']); ?>
</div>
<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
?>
<hr>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=1127443927727324&autoLogAppEvents=1" nonce="6fIOgeIr"></script>
<div class="fb-comments" data-href="<?php echo $CurPageURL; ?>" data-width="100%" data-numposts="5"></div>	
	</article>
</div>