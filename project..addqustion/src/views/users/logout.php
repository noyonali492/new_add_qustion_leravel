    <?php
    include_once ("../../../vendor/autoload.php");
    use App\users\users;
    $obj=new  users();
    ob_start();

    if (isset($_SESSION['userSuccess'])){
        header('location:loging.php');
    }else{

    }
    session_destroy();
    ?>