<?php
    include "include/header.php";
?>
    <!-- Sidebar -->
 <?php
    include "include/sidebar.php";
?>   
	<div id="content-wrapper">
	<div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Class List</li>
        </ol>
		</div>

      <div class="container-fluid">
		<div class="row">
		<?php
		for($i=0; $i<20; $i++){
			?>
		<div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw"></i>
                </div>
                <div class="mr-5">CSE311!</div>
                <div>
					<p>Database Management System</p>
				</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="class.php">
                <span class="float-left">View Class</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
		 <?php  }?>
		  
		  
		</div>

        <!-- Breadcrumbs-->
		</div>
	</div>	
	</div>  
	  
	  
	  
	  
 <?php
    include "include/footer.php";
?>	