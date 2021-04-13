<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
	die();
}
$name='';
$email='';
$mobile='';
$password='';
$department_id='';
$address='';
$birthday='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from employee where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$name=$row['name'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$password=$row['password'];
	$department_id=$row['department_id'];
	$address=$row['address'];
	$birthday=$row['birthday'];
}
if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$department_id=mysqli_real_escape_string($con,$_POST['department_id']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$birthday=mysqli_real_escape_string($con,$_POST['birthday']);
	if($id>0){
		$sql="update employee set name='$name',email='$email',mobile='$mobile',password='$password',department_id='$department_id',address='$address',birthday='$birthday',role='2' where id='$id'";
	}else{
		$sql="insert into employee(name,email,mobile,password,department_id,address,birthday,role) values('$name','$email','$mobile','$password','$department_id','$address','$birthday','2')";
	}
	mysqli_query($con,$sql);
	header('location:employee.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Employee Information</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
                           	<!--name-->
							   <div class="form-group">
								<label class=" form-control-label">Name</label>
								<input type="text" value="<?php echo $name?>" name="name" placeholder="Enter employee name" class="form-control" required></div>
							<!--email-->	

								<div class="form-group">
								<label class=" form-control-label">Email</label>
								<input type="email" value="<?php echo $email?>" name="email" placeholder="Enter email address" class="form-control" required></div>
							<!--mobile-->	
								<div class="form-group">
								<label class=" form-control-label">Mobile</label>
								<input type="text" value="<?php echo $mobile?>" name="mobile" placeholder="Enter mobile number" class="form-control" required></div>
							<!--password-->	
								<div class="form-group">
								<label class=" form-control-label">Password</label>
								<input type="password"  name="password" placeholder="Enter password" class="form-control" required></div>
							<!--department-->	
								<div class="form-group">
								<label class=" form-control-label">Department</label>
								<select name="department_id" class="form-control" required>
									<option value="">Select Department</option>
									<?php

									$res=mysqli_query($con,"select * from department");
									while ($row=mysqli_fetch_assoc($res)) {

										if ($department_id==$row['id']) {
											echo "<option selected='selected' value=".$row['id'].">".$row['department']."</option>";
										}
										else
											echo "<option value=".$row['id'].">".$row['department']."</option>";
									}


									?>
									
								</select>							
							<!--address-->	
								<div class="form-group">
								<label class=" form-control-label">Address</label>
								<input type="text" value="<?php echo $address?>" name="address" placeholder="Enter addess" class="form-control" required></div>
							<!--birthday-->	
								<div class="form-group">
								<label class=" form-control-label">Birthday</label>
								<input type="date" value="<?php echo $birthday?>" name="birthday" placeholder="Enter birthday" class="form-control" required></div>																					

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