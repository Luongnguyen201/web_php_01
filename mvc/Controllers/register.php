<?php
    class Register extends Controller{
        public $UserModel;
        public $a;
        public $Username;
        public $Password1;
        public function __construct(){
            $this->UserModel= $this->Model('User_Model');
        }
        public function Register_user(){
            if(isset($_POST['Register'])){
                $this->Username=$_POST['Username'];
                $this->Password1=$_POST['Password'];
                $Password=password_hash($this->Password1,PASSWORD_DEFAULT);
                $Fullname=$_POST['Fullname'];
                $Number_phone=$_POST['Number_phone'];
                $Address=$_POST['Address'];
                $Email=$_POST['Email'];
                
                //Xác thực Email
                // $to      = "nvluong2k1@gmail.com";
                // $subject = "Tiêu đề email";
                // $message = "<h1>Đây là Email có chứa HTML</h1>
                //             <p>Đoạn văn trong Email</p>";       //MỚI
                // $header  =  "From:myemail@exmaple.com \r\n";
                // $header .=  "Cc:other@exmaple.com \r\n";
                
                // $header .= "MIME-Version: 1.0\r\n";             //MỚI
                // $header .= "Content-type: text/html\r\n";       //MỚI
            
                // $success = mail ($to,$subject,$message,$header);
            
                // if( $success == true )
                // {
                //     echo "Đã gửi mail thành công...";
                // }
                // else
                // {
                //       echo "Không gửi đi được...";
                // }


                if(mysqli_num_rows($this->UserModel->Select_User($this->Username))!=0){
                    $this->a=false;
                }elseif(mysqli_num_rows($this->UserModel->Select_User($this->Username))==0){
                    $this->a=$this->UserModel->Insert_User($this->Username,$Password,$Fullname,$Email,$Number_phone,$Address);
                }
            }
            $this->View("layout_list_product",[
               "page"=>"registerView",
               "result"=>$this->a,
               "Username"=>$this->Username,
               "Password"=>$this->Password1,

           ]);
        }
    }
?>