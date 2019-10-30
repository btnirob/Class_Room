<?php
    include "include/header.php";
?>
    <!-- Sidebar -->
 <?php
    include "include/sidebar.php";
?>
<?php 

	include "config/config.php" ;
	include "lib/database.php" ;
	include "helper/formate.php" ;


?>
<?php  
			$db= new Database();
			$frmt = new Formate();
		?>   
	<div id="content-wrapper">
	<div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
        </ol>
		</div>

      <div class="container-fluid">
		<div class="row">
		<?php
		       $query="select * from class";
			   $class=$db->select($query);
			   if($class){
				  while($result=$class->fetch_assoc()){
					
			  
			?>
		<div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw"></i>
                </div>
                <div class="mr-5"><?php echo  $result['cname']; ?></div>
                <div>
					<p><?php echo  $result['description']; ?></p>
					
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
		 
				  <?php
				  } 
				  
				  }else{
					  echo "You don't have any class yet";
				  }


				  ?>
		</div>

        <!-- Breadcrumbs-->
		</div>
	</div>	
	</div>  
<?php
    include "include/footer.php";
?>	  
	  
	  
	  
 