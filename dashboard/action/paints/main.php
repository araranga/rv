﻿<?php
 $field = array("imgtitle");
 $where = getwheresearch($field);
 $total = countquery("SELECT imgtitle FROM joomgallery $where");
 //primary query
 $limit = getlimit(10,$_GET['p']);
  $query = "SELECT * FROM joomgallery $where $limit";

 $q = mysql_query_md($query);
 $pagecount = getpagecount($total,10);


$field_data = array();
foreach($field as $ff){
    $field_data[] = ucfirst(str_replace("_", " ", $ff));
}



$complan = array();
$queryx  = mysql_query_md("SELECT * FROM joomgallery_catg");
$complan[0] = "Select a Category";
while($rows=mysql_fetch_md_assoc($queryx))
{

  $complan[$rows['cid']] = $rows['name'];
	
}
?>
<style>
#dataTables-example_filter , #dataTables-example_info , #dataTables-example_wrapper .row
{
    display:none;
}
</style>
<h2>Arts Management</h2>
<div class="panel panel-default">
   <div class="panel-body">
         <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                  <div class="panel-body">
                    <input onclick="window.location='<?php echo "?pages=".$_GET['pages']."&task=add"; ?>';" type="button" class="btn btn-primary" value="Add New Data">
                  </div>
               </div>
            </div>
            <div><hr></div>
            <div class="col-md-12">
               <div class="panel panel-default">
                  <div class="panel-body">
                    Search by: <?php echo (implode(", ", $field_data)); ?>
                    <form method=''>
                    <input type='text' value='<?php echo $_GET['search']; ?>' name='search'>
                    <input type='hidden' name='pages' value='<?php echo $_GET['pages'];?>'>
                    <input type='submit' name='search_button' class="btn btn-primary"/>
                    </form>
                  </div>
               </div>
            </div>            
         </div>    
      <div class="table-responsive">

         
         <br/>
         <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
            <thead>
               <tr role='row'>
                  
                  <th>Name</th>
				  <th>Category</th>
				  <th>Image</th>

                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  while($row=mysql_fetch_md_array($q))
                  {
                    $pid = $row['id'];
					


                  ?>
               <tr>
                  <td><?php echo $row['imgtitle']; ?></td>
				  <td><?php echo $complan[$row['catid']]; ?></td>
				  <td><img src='uploads/<?php echo $row['imgfilename']; ?>' width='150'/></td>


                  <td>
                     <input onclick="window.location='<?php echo "?pages=".$_GET['pages']."&task=edit&id=$pid"; ?>';" type="button" class="btn btn-primary btn-sm" value="Edit">
                     <input onclick="window.location='<?php echo "?pages=".$_GET['pages']."&task=delete&id=$pid"; ?>';" type="button" class="btn btn-primary btn-sm" value="Delete">
                  </td>
               </tr>
               <?php
                  }
                  ?>
            </tbody>
         </table>
      </div>
            <div class="row">
               <div class="col-sm-6">
                  <div class="dataTables_paginate paging_simple_numbers">
                     <ul class="pagination">
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
                        <li class="paginate_button <?php echo $active; ?>" aria-controls="dataTables-example" tabindex="0"><a href="<?php echo $url; ?>"><?php echo $c; ?></a></li>
                      <?php
                        }
                      ?>
                     </ul>
                  </div>
               </div>
            </div>      
   </div>
</div>
