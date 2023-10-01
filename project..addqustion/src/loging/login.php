<?php
include_once ("../../vendor/autoload.php");
 use App\admin\Admin;

global $admin_email,$admin_password,$email,$checkemail,$pass,$checkpass;
if (isset($_POST["login"])){
    $admin_email=$_POST["admin_email"];
    $admin_password=$_POST["admin_password"];
   if(empty($admin_email)){
        $email = "<div class='alert alert-danger'>Pleace Your Email</div>";
    }elseif (empty($admin_password)){
        $pass = "<div class='alert alert-danger'>Pleace Your Password</div>";
    }elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$admin_email)){
        $checkemail =  "<div class='alert alert-danger'>Pleace Cheack Your Email</div>";
    }elseif (strlen($admin_password) < 6){
        $checkpass =  "<div class='alert alert-danger'>Userpasword is too short</div>";
    }else{
         $obj = new Admin();
         $obj->setStore($_POST);
       $data =  $obj->getAdminFetch();
       print_r($data);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="css/font-awesome.css" rel="stylesheet" />

    </head>
    <body>
        <div id="loginbox" style="border:10px solid #FFFFFF;">            
            <form id="loginform" class="form-vertical" method="post">
				 <div class="control-group normal_text"> <h3><img src="img/logol.jpg" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="text" placeholder="Admin E-mail" value="<?php echo $admin_email?>" name="admin_email" />
                            <h4 style="width: 250px; margin: 0px auto;"><?php echo $email ;?></h4>
                            <h4 style="width: 250px; margin: 0px auto;"><?php echo $checkemail ?></h4>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" placeholder="Admin Password" value="<?php echo $admin_password?>"  name="admin_password" />
                            <h4 style="width: 250px; margin: 0px auto;"><?php echo $pass; ?></h4>
                            <h4 style="width: 250px; margin: 0px auto;"><?php echo $checkpass ; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left">
                        <a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right">
					<input type="submit" name="login"  class="btn btn-success" value="Login"/>
					</span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
                <div class="form-actions">
                    <span class="pull-left">
                        <a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a>
                    </span>
                    <span class="pull-right">
                        <a class="btn btn-info"/>Reecover</a>
                    </span>
                </div>
            </form>
        </div>
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
