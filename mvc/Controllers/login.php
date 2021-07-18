<?php
    class login extends Controller{
        public $alert="";
        public $User;
        public $result;
        public $product;
        public $Order;
        public function __construct(){        
            $this->User= $this->Model("User_Model");
            $this->product=$this->Model("product");
            $this->Order=$this->Model("Order_model");
        }
        public function Login_User(){   
            if(isset($_POST['login'])){
                $Username=$_POST['Username'];
                $Password=$_POST['Password'];
                $row=mysqli_fetch_array($this->User->getPass());
                if(password_verify($Password,$row['Password'])){
                    if(mysqli_num_rows($this->User->Select_User($Username))==0){
                        $this->alert="Username or password is incorrect!";
                    }else{
                        $result=mysqli_fetch_array($this->User->Select_User($Username));
                        if($result['Status']==0){
                            $this->alert="Account is locked";
                        }else{
                            if(isset($_SESSION['Cart'])){
                                $_SESSION['User']=$Username;
                                header("location:/mvc/Cart/add_Cart");
                            }elseif(!isset($_SESSION['Cart'])){
                                $_SESSION['User']=$Username;
                                header("location:/mvc/Home");
                            }
                        }
                    }      
                }else{
                    $this->alert="Username or password is incorrect!";
                }
            }
            $this->View("Layout_list_product",
            [
                "page"=>"loginView",
                "notice"=>$this->alert
            ]
        );
        }
        public function logout(){
            unset($_SESSION['User']);
            header('location:/mvc/home');
        }
        public function Change_Password(){
            if(isset($_POST['Updatepass'])){
                $Passcheck=$_POST['Password'];
                $Username=$_POST['Username'];
                $Password=$_POST['Newpass'];
                $Password=password_hash($Password,PASSWORD_DEFAULT);
                $row=mysqli_fetch_array($this->User->getPassword($Username));
                if(password_verify($Passcheck,$row['Password'])){
                    $this->result=$this->User->update_user_pass($Username,$Password);
                    // header('location:/mvc/Home');
                }else{
                    $this->alert="Incorrect password";
                }   
            }
            $this->View("Layout_list_product",[
                "page"=>"Change_password_View",
                "notice"=>$this->alert,
                "result"=>$this->result,
            ]);
        }
        public function History(){
            if(isset($_SESSION['User'])){
                $row=mysqli_fetch_array($this->User->Select_User($_SESSION['User']));
                $this->result=$this->Order->get_order_us_desc($row['Id_kh']);
                $r=mysqli_fetch_array($this->Order->get_order_us_desc($row['Id_kh']));
                $Id_dh=$r['Id'];
                $this->alert=$this->Order->get_ct_ddh($Id_dh);
                if(isset($_GET['Id_tt'])){
                    $Id_tt=$_GET['Id_tt'];
                    $this->result=$this->Order->get_dh_id_kh($row['Id_kh'],$Id_tt);
                    $r1=mysqli_fetch_array($this->Order->get_dh_id_kh($row['Id_kh'],$Id_tt));
                    if($r1!=null){
                        $Id_dh=$r1['Id'];
                            $this->alert=$this->Order->get_ct_ddh($Id_dh);
                    }
                }  
                if(isset($_GET['del_Id_dh'])){
                    $Id_dh=$_GET['del_Id_dh'];
                    $this->Order->update_tt_id($Id_dh);
                    header('location:/mvc/login/History');
                }
                $this->View("Layout_list_product",[
                    "page"=>"History_purchase_View",
                    "result"=>$this->result,
                    "ttdh"=>$this->Order->Get_tt_dh(),
                    "detail_or"=>$this->alert,
                    "detail_pr"=>$this->product->List_product(),
                    "tt_don"=>$this->Order->Tinh_trang_dh(),
                ]);
            }else{
                header('location:/mvc/login/Login_User');
            }
        }
    }
?>
