<?php
include_once ("../../../vendor/autoload.php");
use App\users\users;
$obj = new users();
$id = $_GET['id'];
$data = $obj->view($id);
ob_start();

if (isset($_SESSION['userSuccess'])){
    echo $_SESSION['userSuccess'];
}else{
    header('location:create.php');
}

?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>create loging</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body>

        <div class="container">
			<nav class="navbar navbar-default">
				<div class="containe-fluid">
					<div class="navbar-hader">
						<h4 style="text-align:center;">Users View System <span></h4>

					</div>
				</div>
			</nav>

            <div class="panel panel-defult" style="margin-left:320px;">
                <div class="panel-body">
                    <div style="max-width:350px; margin:o auto;">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="garding">User Id</label>
                            <input type="text" value="<?php echo $data['id'] ; ?>"  class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="garding">User Name</label>
                            <input type="text" value="<?php echo $data['username'] ; ?>"  class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="email">User E-mail</label>
                            <input type="tel"  value="<?php echo $data['useremail'] ; ?>" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="garding">User Password</label>
                            <input type="password" value="<?php echo $data['userpassword'] ; ?>" class="form-control" >
                           </div>
                        <a href="index.php" class="btn btn-success">BACEK</a>

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
