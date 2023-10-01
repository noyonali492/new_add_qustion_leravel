<?php
include_once ("../../../vendor/autoload.php");
use App\admin\Admin;
$obj = new Admin();
ob_start();
global $addtitle,$addcontent,$title,$content;
if (isset($_SESSION['userSuccess'])){
    echo $_SESSION['userSuccess'];
}else{
    header('location:../../loging/index.php');
}
if (isset($_SESSION['qustion'])){
    echo $_SESSION['qustion'];
    session_unset($_SESSION['qustion']);
}
    if (isset($_POST["save"])){
        $addtitle=$_POST["addtitle"];
        $addcontent=$_POST["addcontent"];
        if(empty($addtitle)){
            $title = "<div class='alert alert-danger'>Pleace Your Title</div>";
        }elseif(empty($addcontent)){
            $content = "<div class='alert alert-danger'>Pleace Your Content</div>";
        }else{
        $obj->setStore($_POST);
        $obj->addQustionInsert();
        }
    }

    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <title>Add Qustion</title>
    </head>
    <link rel="stylesheet" href="css/redactor.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="font-awesForm Elemenome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <body>
    <form name="" action="" method="post">
        <div class="container">
            <div class="row-fluid">
                <div class="span10">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h3 style="text-align:center;">Add Qustion</h3>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Add Title :</label>
                                    <div class="controls">
                                        <input style="width: 780px" type="text" name="addtitle" value="<?php echo $addtitle ; ?>" class="span11" placeholder="Add Title"/>
                                        <h4 style="text-align: center;margin: 0px auto;" class="alert alert-danger"><?php echo $title ;?></h4>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Add Description :</label>
                                    <div class="controls">
                                        <textarea id="redactor" name="addcontent"></textarea>
                                        <h4 style="text-align: center;margin: 0px auto;" class="alert alert-danger"><?php echo $content ;?></h4>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="save">Save</button>
                                    <button type="submit" class="btn btn-success" name="View">View</button>
                                    <button type="submit" class="btn btn-danger" name="edit">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script src="js/redactor.min.js"></script>
    <script>
        $('.textarea_editor').wysihtml5();
    </script>
    </html>
    <script type="text/javascript">
        $(document).ready(
            function () {
                $('#redactor').redactor();
            }
        );
    </script>

