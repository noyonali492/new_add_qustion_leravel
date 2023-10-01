<?php
namespace App\admin;
use PDO;
    class Admin
    {
        public $admin_email;
        public $admin_password;
        public $addtitle;
        public $addcontent;
        public $date ="";
        public $pdo;
        public function __construct()
        {
            try{
                $this->pdo = new PDO("mysql:host=localhost;dbname=cms", 'root', '');
                session_start();
            }
            catch (PDOException $e){
                echo "Error" . $e->getMessage();
            }
        }
        public function setStore($data){
            if (!empty($data['admin_email'])){
                $this->admin_email =$data['admin_email'];
            }
          if (!empty($data['admin_password'])){
                $this->admin_password =$data['admin_password'];
          }
            if (!empty($data['addtitle'])){
             echo   $this->addtitle =$data['addtitle'];
            }
            if (!empty($data['addcontent'])){
             echo   $this->addcontent =$data['addcontent'];
            }
            date_default_timezone_set('Asia/Dhaka');
            $this->date=date("Y-m-d h:i:s");

        }
        public function addQustionInsert(){
            try{
                $sql = "insert into add_admin_qustion (title,description,create_at) VALUES (:title,:description,:create_at)";
                $noyon = $this->pdo->prepare($sql);
                $noyon->execute(array(
                    ':title'=> $this->addtitle,
                    ':description'=> $this->addcontent,
                    ':create_at'=> $this->date
                ));
                if ($noyon){
                    $_SESSION['qustion']= "Added Qustion Successfully" ;
                    header("location:addQustion.php");
                }else{
                    header('location:index.php');
                }

            }
            catch (PDOException $e){
                echo "Error" . $e->getMessage();
            }
        }
        public function getAllQustionView(){
            try{
                $sql = "select * from add_admin_qustion";
                $noyon = $this->pdo->prepare($sql);
                $noyon->execute();
                $result = $noyon->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch (PDOException $e){
                echo "Error" .$e->getMessage();
            }
        }
        public function getAdminFetch(){
            try{
                $query = "SELECT * FROM admin where admin_email=:admin_email and admin_password=:admin_password";
                $stas =   $this->pdo->prepare($query);
                $stas->execute(array(
                    ':admin_email'=>$this->admin_email,
                    ':admin_password'=>$this->admin_password,
                ));
                $count=$stas->rowCount();
                if ($count>0){
                    $_SESSION['userSuccess']=$this->admin_email;
                    header("location:../views/admin/index.php");


                }
                else
                {
                    return "username and password dosenot match";
                }

            }
            catch (PDOException $e){
                echo "Error" .$e->getMessage();
            }

        }
    }


?>