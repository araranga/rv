<?php
session_start();
require_once("./connect.php");
require_once("./function.php");
?>
<style>

.desktopicon {

    font-size:100px;
    width:100%;
}

.dhold {
    float: left;
    padding: 35px;
        width: 159px;
border: 1px solid #cbcbcb;
    margin: 12px;		
		
}

.dhold span , .dhold .dholdsecond{
	
	text-align:center;

}
</style>
<div class="row">


<div class='dhold'>
	<div class='dholdsecond'>
		<a href='index.php?pages=users'>
		<i class="nav-icon fas fa-user desktopicon"></i>
		<span>Users</span>
		</a>
	</div>
</div>

<div class='dhold'>
	<div class='dholdsecond'>
		<a href='index.php?pages=articles'>
		<i class="nav-icon fas fa-newspaper desktopicon"></i>
		<span>Articles</span>
		</a>
	</div>
</div>

<div class='dhold'>
	<div class='dholdsecond'>
		<a href='index.php?pages=reviews'>
		<i class="nav-icon fas fa-comments desktopicon"></i>
		<span>Reviews</span>
		</a>
	</div>
</div>

<div class='dhold'>
	<div class='dholdsecond'>
		<a href='index.php?pages=paints'>
		<i class="nav-icon fas fa-palette desktopicon"></i>
		<span>Arts</span>
		</a>
	</div>
</div>

<div class='dhold'>
	<div class='dholdsecond'>
		<a href='index.php?pages=paintscategory'>
		<i class="nav-icon fas fa-brush desktopicon"></i>
		<span>Arts Category</span>
		</a>
	</div>
</div>

<div class='dhold'>
	<div class='dholdsecond'>
		<a href='index.php?pages=cms'>
		<i class="nav-icon fas fa-file desktopicon"></i>
		<span>CMS Pages</span>
		</a>
	</div>
</div>

<br style='clear:both;'/>
</div>

