<?php
include_once ("../../../vendor/autoload.php");
use App\admin\Admin;
$obj = new Admin();
$data = $obj->getAllQustionView();
if (isset($_SESSION['userSuccess'])){
    echo $_SESSION['userSuccess'];
}else{
    header('location:../../loging/index.php');
}
echo "<pre>";
print_r($data);
?>
<table class="table table-striped" border="1">
    <tr  style="color: #ffffff; background: black;">
        <td>Id</td>
        <td width="">Username</td>
        <td width="">Email Address</td>
    </tr>
    <?php
    $i=1;
    foreach ($data as $row){
        ?>
        <tr>
            <td><?php echo $i++ ;?></td>
            <td width=""><?php echo $row['title'] ; ?></td>
            <td width=""><?php echo $row['description'] ; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
