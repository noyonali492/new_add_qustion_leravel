    <?php
    include_once ("../../vendor/autoload.php");
    use App\admin\Admin;
    $obj= new Admin();
    ob_start();
    if (isset($_SESSION['userSuccess'])){
        header('location:index.php');
    }else{

    }
    session_destroy();
    ?>