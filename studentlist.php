<?php
    include "include/header.php";
?>
    <!-- Sidebar -->
 <?php
    include "include/sidebarclass.php";
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
       

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
           <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">CSE311</a>
          </li>
          <li class="breadcrumb-item active">Student List</li>
        </ol></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="width:5%;">Serial</th>
                    <th style="width:15%;">ID</th>
                    <th style="width:20%;">Name</th>
                    <th style="width:30%;">Department</th>
                    <th style="width:20%;">Major</th>
                    <th style="width:5%;">Credit</th>
                    <th style="width:5%;">CGPA</th>
                  </tr>
                </thead>
               <?php
			   $i=0;
				$query="select * from studentlist";
				$list=$db->select($query);
				if($list){
					while($result=$list->fetch_assoc()){
						++$i;
			   ?>
                <tbody>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $result['sid'];?></td>
                    <td><?php echo $result['sname'];?></td>
                    <td><?php echo $result['sdepartment'];?></td>
                    <td><?php echo $result['smajor'];?></td>
                    <td><?php echo $result['credit'];?></td>
                    <td><?php echo $result['cgpa'];?></td>
                  </tr> 
                </tbody>
				<?php
					}
				}else{
					echo "Samir is a bad boy";
				}
				?>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php
    include "include/footer.php";
?>