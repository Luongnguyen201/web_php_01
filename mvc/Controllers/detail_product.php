<?php
    class detail_product extends Controller{
        public $product;
        public $resutl;
        public $User;
        public $total;
        public $limit;
        public $total_page;
        public $cr_page;
        public $start;
        public function __construct(){
            $this->product=$this->Model("product");
            $this->User=$this->Model("User_Model");
        }
        public function Detail(){
            if(isset($_GET['Id_sp'])){
                $Id_sp=$_GET['Id_sp'];
                $this->total=mysqli_num_rows($this->User->Bl_par($Id_sp));
                $this->limit=5;
                $this->total_page=ceil($this->total/$this->limit);
                $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                $this->start=($this->cr_page-1)*$this->limit;
                if(isset($_POST['Binh_luan'])){
                    if(isset($_SESSION['User'])){
                        $Username=$_SESSION['User'];
                        $Binh_luan=$_POST['Binh_luan'];
                        $this->resutl=mysqli_fetch_array($this->User->Select_User($_SESSION['User']));
                        $Id_kh=$this->resutl['Id_kh'];
                        $filename =$_FILES['Anh_bl']['name'];        
                        $file_tmp =$_FILES['Anh_bl']['tmp_name'];					
                        move_uploaded_file($file_tmp,"public/image/".$filename );
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date = date('Y/m/d H:i:s' , time());
                        $this->resutl=$this->User->Insert_bl($Id_sp,$Id_kh,$Username,$Binh_luan,$filename,$date);
                        header('refresh:0');
                    }else{
                        echo"<script>var result = confirm('LOGIN TO COMMENT !');
                        if (result == true) {
                            location='/mvc/login/Login_User'
                        }</script>";
                    }
                }
                $this->View("Layout_list_product",[
                    "page"=>"product_detail",
                    "result"=>$this->product->product_Id($Id_sp),
                    "Get_bl"=>$this->User->Get_bl($Id_sp,$this->start,$this->limit),
                    "Total"=>$this->total_page,
                    "Page"=>$this->cr_page,
                    "Id_sp"=>$Id_sp,
                    "ad_product"=>$this->product->ad_product(),
                    "ad_product1"=>$this->product->List_product(),
                ]);
            }
        }
    }
?>