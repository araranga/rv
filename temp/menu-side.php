     <div id="block-side" class="grid-box" style="position : relative;">
       <div id="side-container">
         <header id="header">
           <div id="header-responsive">
             <a href="http://www.royveneracion.com" class="logo">
               <div class="custom-logo size-auto"></div>
             </a>
             <form style='width: 150px;' class="searchbox" action="/index.php" method="GET" role="search">
               <input type="text" value="" name="searchword" placeholder="search..." autocomplete="off">
               <button type="reset" value="Reset"></button>
				<input type="hidden" name="mvcs" value="mainsearch">
             </form>
             <select class="menu-responsive" onchange="menumobile(this.value)">
               <option value="/" class="level1 active current" selected="selected">Home</option>
               <option value="/articles" class="level1">Articles</option>
               <option value="/cms/art-statement" class="level1">Art Statement</option>
               <option value="/reviews" class="level1 parent">Reviews</option>
<?php
  $q = mysql_query_md("SELECT * FROM `content_v2` WHERE catid=11 ORDER BY `content_v2`.`publish_up` ASC LIMIt 5");
  $news_count = 0;
  while($row=mysql_fetch_md_array($q))
  {
?>	  			   
               <option value="/reviews/<?php echo $row['alias']; ?>" class="level2">- <?php echo $row['title']; ?></option>
			   
<?php } ?>				   
			   
               <option value="/cms/about-the-artist" class="level1">About the Artist</option>
               <option value="/cms/contact-info" class="level1 parent">Contact Info</option>

             </select>
           </div>
           <a id="logo" href="/">
             <div class="custom-logo size-auto"></div>
           </a>
           <div id="search">
             <form id="searchbox-40" class="searchbox" action="/index.php" method="GET" role="search">
               <input type="text" value="" name="searchword" placeholder="search..." autocomplete="off">
               <button type="reset" value="Reset"></button>
               <input type="hidden" name="mvcs" value="mainsearch">

             </form>
             <script src="/Home_files/search.js"></script>
             <script>
			 function menumobile(url){
				 
				 window.location = url;
			 }
               jQuery(function($) {
                 $('#searchbox-40 input[name=searchword]').search({
                   'url': '/search.php?tmpl=raw&amp;type=json&amp;ordering=&amp;searchphrase=all',
                   'param': 'searchword',
                   'msgResultsHeader': 'Search Results',
                   'msgMoreResults': 'More Results',
                   'msgNoResults': 'No results found'
                 }).placeholder();
               });
             </script>
           </div>
           <nav id="menu">
             <ul class="menu menu-dropdown">
               <li class="level1 item133 active current">
                 <a href="/" class="level1 active current">
                   <span>Home</span>
                 </a>
               </li>
               <li class="level1 item225">
                 <a href="/articles" class="level1">
                   <span>Articles</span>
                 </a>
               </li>
               <li class="level1 item102">
                 <a href="/cms/art-statement" class="level1">
                   <span>Art Statement</span>
                 </a>
               </li>
               <li class="level1 item105 parent">
                 <a href="/reviews" class="level1 parent">
                   <span>Reviews</span>
                 </a>
                 <div class="dropdown columns1" style="display: none; overflow: hidden;">
                   <div style="overflow: hidden;">
                     <div>
                       <div class="dropdown-bg">
                         <div>
                           <div class="width100 column">
                             <ul class="level2" style="min-height: 198px;">
							 
<?php
  $q = mysql_query_md("SELECT * FROM `content_v2` WHERE catid=11 ORDER BY `content_v2`.`publish_up` DESC LIMIt 5");
  $news_count = 0;
  while($row=mysql_fetch_md_array($q))
  {
?>	  
							 
							 
                               <li class="level2 item219">
                                 <a href="/reviews/<?php echo $row['alias']; ?>" class="level2">
                                   <span><?php echo $row['title']; ?></span>
                                 </a>
                               </li>
<?php } ?>	
	
							   
                             </ul>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </li>
               <li class="level1 item106">
                 <a href="/cms/about-the-artist" class="level1">
                   <span>About the Artist</span>
                 </a>
               </li>
               <li class="level1 item107 parent">
                 <a href="/cms/contact-info" class="level1 parent">
                   <span>Contact Info</span>
                 </a>

               </li>
             </ul>
             <div id="menu-follower" style="display: block; top: 10px;"></div>
           </nav>
         </header>
         <aside id="sidebar-a" class="grid-block">
           <div class="grid-box width100 grid-v">
             <div class="module mod-headerline sidebar-a-bottom-fixed deepest">
               <div class="sidebar-a-bottom-fixed">&nbsp;</div>
             </div>
           </div>
         </aside>
       </div>
     </div>