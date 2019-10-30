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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">CSE311</li>
        </ol>
		</div>
		<div class="container-fluid" >
		<div class="col-xl-6 col-sm-6 mb-4">
            <div class="card  o-hidden h-100">
		<div class="container-fluid">
		<?php
		if(isset($_POST['post'])){
			
			
			  $cname = mysqli_real_escape_string($db->link, $_POST['cname']);
		      $description = mysqli_real_escape_string($db->link, $_POST['description']);
		      $cteacher = mysqli_real_escape_string($db->link, $_POST['cteacher']);
		      $ccode = mysqli_real_escape_string($db->link, $_POST['ccode']);
		    
	

		   if($cname==''|| $description==''|| $cteacher==''|| $ccode==''){
			   $error = "Field must not be empty.";
			   echo $error;
		   }
		        
		   else{
			   $query= "INSERT INTO `class`(`cname`, `description`, `cteacher`, `rcode`) Values('$cname', '$description', '$cteacher', '$ccode')";
				$create = $db->insertpost($query);
							
		   
		   }
		   
		   }
		 function validate($data){
		   $data = trim($data);
		   $data = stripcslashes($data);
		   $data = htmlspecialchars($data);  
			return $data;
	   }
		
		?>
		<form action="createclass.php" method="post">
		<h4 style="text-align:center;margin-top:5px;color:skyblue;">Open your own class</h4>
		<div class="form-group">
				<label >Class Name</label>
				<input type="text"  name="cname" class="form-control" />
			</div>
			<div class="form-group">
				<label >Description</label>
				<input type="text"  name="description" class="form-control" />
		</div>
		<div class="form-group">
				<label >Class Teacher</label>
				<input type="text"  name="cteacher" class="form-control" />
		</div>
		<div class="form-group">
				<label >Class Code</label>
				<input type="text"  name="ccode" class="form-control" />
		</div>
		
		<button name="post" class="btn btn-primary btn-block">Post!!</button>
		</form>
		</br>
		</div>
	</div>
			</div>
			
		
</div>	
</div>  
	  
	  
	  
	  
 <?php
    include "include/footer.php";
?>