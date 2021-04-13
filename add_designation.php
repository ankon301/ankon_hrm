<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
	die();
}
$designation='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from designation where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$designation=$row['designation'];
}
if(isset($_POST['designation'])){
	$designation=mysqli_real_escape_string($con,$_POST['designation']);
	if($id>0){
		$sql="update designation set designation='$designation' where id='$id'";
	}else{
		$sql="insert into designation(designation) values('$designation')";
	}
	mysqli_query($con,$sql);
	header('location:designation.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Designation</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="designation" class=" form-control-label">Designation Title</label>
								<input type="text" value="<?php echo $designation?>" name="designation" placeholder="Enter Designation Title" class="form-control" required></div>
							   
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>