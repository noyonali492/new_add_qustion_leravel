<?php
include_once ("../../../vendor/autoload.php");
use App\users\users;
 global $msg,$username,$useremail,$userpassword,$name,$email,$pass,$checkname,$checkemail,$checkpass,$time,$date;
if (isset($_POST["add"])){
    $username=$_POST["username"];
    $useremail=$_POST["useremail"];
    $userpassword=$_POST["userpassword"];
    if(empty($username)){
        $name = "<div class='alert alert-danger'>Pleace Your Name</div>";
    }elseif(empty($useremail)){
        $email = "<div class='alert alert-danger'>Pleace Your Email</div>";
    }elseif (empty($userpassword)){
        $pass = "<div class='alert alert-danger'>Pleace Your Password</div>";
    }elseif(preg_match("/^[a-zA-Z ]*$/",$username)){
        $checkname = "<div class='alert alert-danger'>Only letters and white space allowed</div>";
    }elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$useremail)){
        $checkemail =  "<div class='alert alert-danger'>Pleace Cheack Your Email</div>";
    }elseif (strlen($userpassword) < 6){
        $checkpass =  "<div class='alert alert-danger'>Userpasword is too short</div>";
    }else{
        $obj = new users();
        $obj->setData($username,$useremail,$userpassword);
		$obj->dataInsert();

    }
}
// if (isset($_POST["update"])){
//     $username=$_POST["username"];
//     $useremail=$_POST["useremail"];
//     $userpassword=$_POST["userpassword"];
//     if(preg_match("/^[a-zA-Z ]*$/",$username)){
//         $checkname = "<div class='alert alert-danger'>Only letters and white space allowed</div>";
//     }elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$useremail)){
//         $checkemail =  "<div class='alert alert-danger'>Pleace Cheack Your Email</div>";
//     }elseif (strlen($userpassword) < 6){
//         $checkpass =  "<div class='alert alert-danger'>Userpasword is too short</div>";
//     }else{
//         date_default_timezone_set('Asia/Dhaka');
//         $time = date('h:i:sa');
//         $date = date("d/m/Y") ;

//         $obj = new users();
//         $obj->setData($username,$useremail,$userpassword,$date);
//         $obj->updateData();
//     }
// }

// if (isset($_POST["delete"])){
//     $username=$_POST["username"];
//     $useremail=$_POST["useremail"];
//     $userpassword=$_POST["userpassword"];
//    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$useremail)){
//         $checkemail =  "<div class='alert alert-danger'>Pleace Cheack Your Email</div>";
//     }else{
//         date_default_timezone_set('Asia/Dhaka');
//         $time = date('h:i:sa');
//         $date = date("d/m/Y") ;

//         $obj = new users();
//         $obj->setData($username,$useremail,$userpassword,$date);
//         $obj->deleteData();
//     }
// }

?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Create Users page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
       
    </head>
    <body>
        
        <div class="container">
			<nav class="navbar navbar-default">
				<div class="containe-fluid">
					<div class="navbar-hader">
						<h4 style="text-align: center; margin-right: 100px; ">Users Create Pages</h4>
                        <a style="margin-top: -30px; margin-right: 80px;" class="pull-right btn btn-info" href="../../../index.php">BACEK</a>

					</div>
				</div>
			</nav>

            <div class="panel panel-defult" style="margin-left:320px;">
                <div class="panel-body">
                    <div style="max-width:350px; margin:o auto;">       
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="garding">User Name</label>
                            <input type="text" name="username" value="<?php echo $username ; ?>"  class="form-control" >
                            <h4><?php echo $name; ?></h4>
                            <h4><?php echo $checkname; ?></h4>
                        </div>
                        <div class="form-group">
                            <label for="email">User E-mail</label>
                            <input type="tel" name="useremail" value="<?php echo $useremail ; ?>" class="form-control" >
                            <h4><?php echo $email; ?></h4>
                            <h4><?php echo $checkemail; ?></h4>
                        </div>
                        <div class="form-group">
                            <label for="garding">User Password</label>
                            <input type="password" name="userpassword" value="<?php echo $userpassword ; ?>" class="form-control" >
                            <h4><?php echo $pass; ?></h4>
                            <h4><?php echo $checkpass; ?></h4>
                        </div>
                        <button type="submit" name="add"  class="btn btn-success">ADD</button>
                       <!--  <button type="submit" name="update"  class="btn btn-success">UPDATE</button>
                        <button type="submit" name="delete"  class="btn btn-success">DELETE</button> -->

                    </form>
                    </div>
                </div>
            </div>
            <div class="well">
                <h3>www.noyonliveproject.com
                    <span class="pull-right">Like Us www.facebook/noyon.com</span>

                </h3>
            </div>
		</div>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
