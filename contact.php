<?php
    $active ='Contact';
    include("includes/header.php");
?>
   
   <div id="content"><!-- content begin -->
       <div class="container"><!-- container begin -->
           <div class="col-md-12"><!-- col-md-12 begin -->
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Contact Us
                   </li>
               </ul><!-- breadcrumb Finish -->
           </div><!--  col-md-12 Finish -->
          
           <div class="col-md-12"><!-- col-md-12 begin -->
                <div class="box"><!-- box begin -->
                    <div class="box-header"><!-- box-header begin -->
                        <center>
                            <h2>Feel free to Contact Us</h2>
                            <p class="text-muted"><!-- text-muted begin -->
                                if you have any questions, feel free to contact Us. Our service works <strong> 24/7</strong>.
                            </p><!-- text-muted finish -->
                        </center>
                        <form action="contact.php" method="post"><!-- form begin -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Message</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div><!-- form-group finish -->
                            <div class="text-center"><!--text-center begin  -->
                                <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md">Send message</i>
                                </button>
                            </div><!--text-center finish  -->
                        </form><!-- form finish -->
                        <?php
                        if(isset($_POST['submit'])){
                            ///admin receives message with this ///
                            $sender_name = $_POST['name'];
                            $sender_email = $_POST['email'];
                            $sender_subject = $_POST['subject'];
                            $sender_message = $_POST['message'];
                            $receiver_email = "mekonen.mesfin@gmail.com";
                            mail($receiver_email,$sender_name,$sender_subject,$sender_message);
                            $email = $_POST['email'];
                            $subject = "welcome to my website";
                            $msg = "Thanks for sending us message";
                            $from = "mekonen.mesfin@gmail.com";
                            mail($email,$subject,$msg,$from);
                            echo "<h2 align='center'>Your message has been successfully sent</h2>";
                        }
                        ?>
                    </div><!-- box-header finish -->
                </div><!-- box finish -->
           </div><!-- col-md-12 finish -->
           </div><!-- container -->
   </div><!-- content Finish -->

   <?php 
    include("includes/footer.php");
   ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>