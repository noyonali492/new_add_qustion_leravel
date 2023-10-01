<?php
namespace App\users;
use PDO;
 class users{
     public $username ="";
     public $useremail ="";
     public $userpassword ="";
     public $date ="";
     public $id ="";
     public function __construct()
     {
         try
         {
             $this->pdo = new PDO("mysql:host=localhost;dbname=cms",'root','');
             session_start();
         }
         catch(PDOException $e)
         {
             echo 'Error'. $e->getMessage();
         }
     }

     public function setData($username,$useremail,$userpassword){
        $this->username =$username;
     echo   $this->useremail =$useremail;
        $this->userpassword =md5($userpassword);

         date_default_timezone_set('Asia/Dhaka');
         $this->date=date("Y-m-d h:i:s");
     }
     public function setUpdateData($data){
          $this->id=$data['id'];
          $this->username=$data['username'];
          $this->useremail=$data['useremail'];
          $this->userpassword=$data['userpassword'];
         date_default_timezone_set('Asia/Dhaka');
         $this->date=date("Y-m-d h:i:s");
     }
     public function dataInsert(){

         try{
             $sql = "insert into users (username,useremail,userpassword,create_at) VALUES (:username,:useremail,:userpassword,:create_at)";
             $noyon = $this->pdo->prepare($sql);
             $noyon->execute(array(
                 ':username'=> $this->username,
                 ':useremail'=> $this->useremail,
                 ':userpassword'=> $this->userpassword,
                 ':create_at'=> $this->date

             ));
             if ($noyon){
                    $_SESSION['userSuccess']= "User Successfully Added" ;
                    header("location:index.php");
             }else{
                 header('location:create.php');
             }
         }
         catch (PDOException $e){
             echo "error" . $e->getMessage();
         }
         return true;
     }
     public function updateData(){
         try{
             $sql = "update users set username=:username,useremail = :useremail,userpassword=:userpassword,update_at=:update_at WHERE id=$this->id";
        $noyon = $this->pdo->prepare($sql);
        $noyon->execute(array(
             ':username'=> $this->username,
             ':useremail'=> $this->useremail,
             ':userpassword'=> $this->userpassword,
             ':update_at'=> $this->date ,

        ));
             if ($noyon) {
                 $_SESSION['userSuccess'] = "User Successfully Update";
                 header("location:index.php");
             }else{
                 header('location:create.php');
             }

         return true;

         }
         catch (PDOException $e){
            echo "Error" . $e->getMessage();
         }
     }
     public function deleteData($id=''){
         try{
             $query = "DELETE FROM users where id=$id";

             $stmt = $this->pdo->query($query);
             if ($stmt) {
                 $_SESSION['userSuccess'] = "User Successfully Deleted";
                 header("location:index.php");
             }else{
                 header('location:create.php');
             }

         }
         catch (PDOException $e){
             echo "Error" . $e->getMessage();
         }
     }
     public function getAllUsers(){
         try{
             $sql = "select * from users";
             $noyon = $this->pdo->prepare($sql);
             $noyon->execute();
             $result = $noyon->fetchAll(PDO::FETCH_ASSOC);
             return $result;
         }
         catch (PDOException $e){
             echo "Error" .$e->getMessage();
         }
     }
     public function view($id = '')
     {
         try {
             $query = "SELECT * FROM users where id=$id";


             $stmt = $this->pdo->query($query);
             $data = $stmt->fetch(PDO::FETCH_ASSOC);
             return $data;
         } catch (PDOException $e) {
             echo 'ERROR: ' . $e->getMessage();
         }
     }
//     public function fetchlogin(){
//         try {
//             $sql = "select * from users WHERE id";
//             $stmt = $this->pdo->query($sql);
//             $data = $stmt->fetch();
//             return $data;
//         } catch (PDOException $e) {
//             echo "Error" .$e->getMessage();
//         }
//
//
//     }
////     public function updateData(){
//         $sql = "update users set username=:username,userpassword=:userpassword,update_at=:update_at WHERE useremail = :useremail";
//         $noyon = $this->pdo->prepare($sql);
//         $noyon->execute(array(
//             ':username'=> $this->username,
//             ':useremail'=> $this->useremail,
//             ':userpassword'=> $this->userpassword,
//             ':update_at'=> $this->date ,
//
//         ));
//         return true;
//     }
//     public function deleteData(){
//         $sql = "delete from users WHERE useremail = :useremail";
//         $noyon = $this->pdo->prepare($sql);
//         $noyon->execute(array(
//             ':useremail'=> $this->useremail,
//         ));
//         return true;
//     }
 }


?>