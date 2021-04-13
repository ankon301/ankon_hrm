<?php
require('top.inc.php');
?>
<?php
//require('db.inc.php');

if (isset($_GET['id']) ) {
   $id=$_GET['id'];
   //$id=mysqli_real_escape_string($con,$_GET['id']);
   mysqli_query($con,"select * from employee where id='$id'");
   $res=mysqli_query($con,"select * from employee where id='$id'");
}




?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Employee Increment Status</h4>
                    
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="30%">Name</th>
                                       <th width="15%">Incriment Status</th>
                                       
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
                                       <td><?php echo $row['name']?></td>
                                       <?php

                                       

                                          $dob=date_create($row['birthday']);
                                          $today=date_create(date("Y-m-d"));
                                          $dif=date_diff($dob,$today);

                                          if (($dif->y)>28) { ?>

                                              <td> Eligible </td>
                                             
                                          <?php } else { ?>

                                           
                                          <td>Not Eligible</td>

                                       <?php } ?> 


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