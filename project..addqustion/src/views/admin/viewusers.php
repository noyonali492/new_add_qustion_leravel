<?php
include_once ("../../../vendor/autoload.php");
use App\users\users;
$obj = new users();
$data=$obj->getAllUsers();
use App\admin\Admin;
$obj = new Admin();
ob_start();

if (isset($_SESSION['userSuccess'])){
    echo $_SESSION['userSuccess'];
}else{
    header('location:../../loging/index.php');
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>index page</title>
    <script>
        function confirm_delete(){
            return delete ('are you sure want to delete this data?')
        }
    </script>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">

    <div class="panel panel-defult">
        <div class="panel-body">
            <table class="table table-striped" border="1">
                <tr  style="color: #ffffff; background: black;">
                    <td style="color: black;">Id:</td>
                    <td style="color: black;">Username:</td>
                    <td style="color: black;">Email Address</td>
                    <td style="color: black;">Action</td>
                </tr>
                <?php
                    $i=1;
                    foreach ($data as $row){
                ?>
                        <tr>
                            <td><?php echo $i++ ;?></td>
                            <td width=""><?php echo $row['username'] ; ?></td>
                            <td width=""><?php echo $row['useremail'] ; ?></td>
                            <td>
                             <a class="btn btn-success" href="view.php?id=<?php echo $row['id'];?>">View</a>
         <a onclick=" return confirm_delete();" class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                 }
                ?>

            </table>
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
