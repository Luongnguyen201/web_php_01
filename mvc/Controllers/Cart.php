<?php
    class Cart extends Controller{
        public $product;
        public $result=0;
        public $User1=0;
        public $User;
        public $Order;
        public $Update_User;
        public function __construct()
        {
            $this->product= $this->Model("product");
            $this->User=$this->Model("User_Model");
            $this->Order=$this->Model("Order_model");
        }

        public function add_Cart(){ 

            if(isset($_GET['action'])){
                switch ($_GET['action']) {
                    case 'add':
                        $Id_sp=$_GET['Id_sp'];
                        if(isset($_SESSION['Cart'][$Id_sp])){
                            if(isset($_POST['Quantity'])){
                                $_SESSION['Cart'][$Id_sp]+=$_POST['Quantity'];
                                header("location:/mvc/Cart/add_Cart");
                            }else{
                                $_SESSION['Cart'][$Id_sp]++;
                                header("location:/mvc/Cart/add_Cart");
                            }
                        }else{
                            if(isset($_POST['Quantity'])){
                                $_SESSION['Cart'][$Id_sp]=$_POST['Quantity'];
                                header("location:/mvc/Cart/add_Cart");
                            }else{
                                $_SESSION['Cart'][$Id_sp]=1;
                                header("location:/mvc/Cart/add_Cart");
                            }
                        }
                        break;
                    case 'delete':
                        $Id_sp=$_GET['Id_sp'];
                        unset($_SESSION['Cart'][$Id_sp]);
                        header("location:/mvc/Cart/add_Cart");            
                        break;
                    case 'deleteAll':
                        unset($_SESSION['Cart']);
                        header("location:/mvc/Cart/add_Cart");
                        break;
                    case 'update':
                        foreach(array_keys($_SESSION['Cart']) as $key){
                            $_SESSION['Cart'][$key]=$_POST[$key];
                            header("location:/mvc/Cart/add_Cart");
                        }
                        break;  
                    case 'order':
                        if(!isset($_SESSION['User'])){
                            header("location:/mvc/login/Login_User");
                        }
                        break;
                    case 'Update_User':
                        if(isset($_SESSION['User'])){
                            if(isset($_POST['Update_User'])){
                                $Username=$_SESSION['User'];
                                $Fullname=$_POST['Fullname'];
                                $Email=$_POST['Email'];
                                $Phone_number=$_POST['Phone_number'];
                                $Address=$_POST['Address'];
                                $this->Update_User=$this->User->Update_User($Username,$Fullname,$Email,$Phone_number,$Address);  
                            }
                        }
                        header("location:/mvc/Cart/add_Cart");
                        break;
                    case 'Order_product':
                        if(isset($_POST['Buy'])){
                            $MethodId=$_POST['OrderMethodId'];
                            $Id_kh=$_POST['Id_kh'];
                            $Fullname=$_POST['Fullname'];
                            $Gia_don=$_POST['Gia_don'];
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $date = date('Y/m/d', time());
                            $Status=$_POST['Status'];
                            $this->Order->Order_method($Id_kh,$Fullname,$MethodId,$Gia_don,$date,$Status);
                            $tb_don_dh=mysqli_fetch_array($this->Order->getMethodId());
                            $Id_dh=$tb_don_dh['Id'];
                            foreach(array_keys($_SESSION['Cart']) as $Id_sp){
                                $So_luong=$_SESSION['Cart'][$Id_sp];
                                $product_sp=mysqli_fetch_array($this->product->product_Id($Id_sp));    
                                $Gia_ban_sp=$product_sp['Gia_ban'];
                                $Khuyen_mai=$product_sp['Khuyen_mai'];
                                $Thanh_tien=$Gia_ban_sp*(100-$Khuyen_mai)/100;
                                $this->Order->Insert_ct_dh($Id_dh,$Id_sp,$Gia_ban_sp,$Khuyen_mai,$So_luong,$Thanh_tien);
                            }
                            unset($_SESSION['Cart']);
                            header("location:/mvc/login/History");
                        }
                        break;
                }       
            }
            if(isset($_SESSION['Cart']) && $_SESSION['Cart']!=null){
                    $ListId=0;
                    foreach(array_keys($_SESSION['Cart']) as $key){
                        $ListId.=','.$key;
                        $this->result=$this->product->product_Cart($ListId);
                    }
                }
            if(isset($_SESSION['User'])){
               $this->User1=$this->User->Select_User($_SESSION['User']); 
            }
            
            $this->View("Layout_list_product",
            [
                "page"=>"CartView", 
                "product"=>$this->result,
                "ad_product"=>$this->product->ad_product(),
                "User"=> $this->User1,
                "Method"=>$this->Order->getMethod(),
            ]
        );
        }
    }
?>