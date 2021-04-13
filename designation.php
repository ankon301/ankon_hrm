<?php
require('top.inc.php');
?>
<?php
//require('db.inc.php');
if (isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) ) {
   $id=mysqli_real_escape_string($con,$_GET['id']);
   mysqli_query($con,"delete from designation where id='$id'");
}
$res=mysqli_query($con,"select * from designation");

?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Designation</h4>
						   <h4 class="box_title_link"><a href="add_designation.php">Add Designation</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="70%">Designation</th>
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $i=1;
                                       while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                       <td><?php echo $i?></td>
                                    <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['designation']?></td>
                                    <td><a href="add_designation.php?id=<?php echo $row['id']?>">Edit</a> <a href="designation.php?id=<?php echo $row['id']?>&type=delete">Delete</a></td>
                                    </tr>
                                       <?php 
                                       $i++;
                                    } ?>
                                 </tbody>
                                 
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         
<?php
require('footer.inc.php');
?>