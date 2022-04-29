<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Users
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i> View Users
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <div class="table-responsive"><!-- table-responsive begin-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin-->
                        <thead><!--thead begin-->
                            <tr><!--tr begin-->
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Image</th>
                                <th>Country</th>
                                <th>About</th>
                                <th>Contact</th>
                                <th>Job</th>
                                <th>Edit User </th>
                                <th>Delete User </th>
                            </tr><!--tr finish-->
                        </thead><!--thead finsih-->
                        <tbody><!--tbody begin-->
                           <?php
                           $i=0;
                            $get_users = "select * from admins";
                            $run_users = mysqli_query($conn,$get_users);
                            
                            while($row_users=mysqli_fetch_array($run_users))
                            {
                                $user_id = $row_users['admin_id'];
                                $user_name = $row_users['admin_name'];
                                $user_email = $row_users['admin_email'];
                                $user_pass = $row_users['admin_pass'];
                                $user_img = $row_users['admin_image'];
                                $user_country = $row_users['admin_country'];
                                $user_about = $row_users['admin_about'];
                                $user_contact = $row_users['admin_contact'];
                                $user_job = $row_users['admin_job'];
                               
                                $i++;
                                if(isset($user_id) || isset($user_name) || isset($user_email) 
                                || isset($user_id) || isset($user_id) || isset($user_id)
                                || isset($user_pass) || isset($user_img) || isset($user_country)
                                || isset($user_about) || isset($user_contact) || isset($user_job))
                               {
                            
                           ?>
                                
                           <tr>
                               
                               <td><?php echo $user_id;?></td>
                               <td><?php echo $user_name; ?></td>
                               <td><?php echo $user_email;?></td>
                               <td><?php echo $user_pass; ?></td>
                               <td><img src="admin_images/<?php echo $user_img; ?>" width="60" height="50"></td>
                               <td><?php echo $user_country;?></td>
                               <td><?php echo $user_about; ?></td>
                               <td><?php echo $user_contact;?></td>
                               <td><?php echo $user_job; ?></td>
                               <td><a href="index.php?user_profile=<?php echo $user_id; ?>"><i class="fa fa-pencil"> Edit</i></a></td>
                               <td><a href="index.php?delete_user=<?php echo $user_id; ?>"><i class="fa fa-trash"> Delete</i></a></td>
                           </tr>
                           
                           <?php } } ?>
                        </tbody><!--tbody finsih-->
                    </table><!--table table-hover begin-->
                </div><!-- table-responsive finish-->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 2 finish-->


<?php } ?>