<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



<li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pages=changepass" class="nav-link">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?pages=editprofile" class="nav-link">
                  <i class="fas fa-address-card nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>








<?php if ($_SESSION['role']==1) { ?>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Administration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="index.php?pages=users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="index.php?pages=articles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Articles</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="index.php?pages=reviews" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reviews</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="index.php?pages=paints" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paints</p>
                </a>
              </li>
			  
              <li class="nav-item">
                <a href="index.php?pages=paintscategory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paints - Category</p>
                </a>
              </li>




              <li class="nav-item">
                <a href="index.php?pages=cms" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CMS Pages</p>
                </a>
              </li>
			  
			  <!--

              <li class="nav-item">
                <a href="index.php?pages=system" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configuration</p>
                </a>
              </li>
			  
			  -->
              
           </ul></li>
<?php } ?>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
         </ul>
      </nav>