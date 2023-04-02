<div id="system">
<style>
.content.clearfix img {
    max-width: 100%;
}
.jg_search {
    display: none;
}
</style>
<?php
 $query = "SELECT * FROM tbl_cms WHERE alias = '{$_GET['alias_url']}'";
 $q = mysql_query_md($query);
 $row=mysql_fetch_md_array($q);
 $url = "/cms/".$row['alias'];
?>
<article class="item" data-permalink="<?php echo $url; ?>">

		
				<header>

											
							
								
			<h1 class="title"><?php echo $row['pagetitle']; ?></h1>

			
		</header>
			

<div class="content clearfix">

		<?php echo str_replace('"images','"/images',$row['pagecontent']); ?>
</div>


	</article>
</div>