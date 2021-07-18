<?php
    class admin extends Controller{
        public $cotegory;
        public $product;
        public $User;
        public $Order;
        public $result;
        public $Username;
        public $Password;
        public $alert="";
        public $total;
        public $limit;
        public $total_page;
        public $cr_page;
        public $start;
        public function __construct(){
            $this->Order=$this->Model("Order_model");
            $this->cotegory= $this->Model("cotegory");
            $this->product=$this->Model("product");
            $this->User=$this->Model("User_Model");
        }
        public function add_product(){
            if(isset($_SESSION['User_Nd'])){
                $kq=FALSE;
                if(isset($_POST['add_product'])){
                    if($_POST['Ten_sp']!=null && $_POST['Gia_mua']!=null && $_POST['Gia_ban']!=null && $_POST['So_luong']!=null && $_POST['Khuyen_mai']!=null){
                        $Id_dm=$_POST['Id_dm'];
                        $Ten_sp=$_POST['Ten_sp'];
                        $Gia_mua=$_POST['Gia_mua'];
                        $Gia_ban=$_POST['Gia_ban'];
                        $So_luong=$_POST['So_luong'];
                        $Khuyen_mai=$_POST['Khuyen_mai'];
                        $He_dieu_hanh=$_POST['He_dieu_hanh'];
                        $Ung_dung=$_POST['Ung_dung'];
                        $Cong_nghe_hinh_anh=$_POST['Cong_nghe_hinh_anh'];
                        $Giong_noi=$_POST['Giong_noi'];
                        $Remote=$_POST['Remote'];
                        $Size=$_POST['Size'];
                        $Nam_sx=$_POST['Nam_sx'];
                        $Mo_ta=$_POST['Mo_ta'];
                        if(isset($_FILES['Anh_sp'])){
                            $filename =$_FILES['Anh_sp']['name'];        
                            $file_tmp =$_FILES['Anh_sp']['tmp_name'];					
                            move_uploaded_file($file_tmp,"public/image/".$filename );
                            $kq=$this->product->Add_product($Id_dm,$Ten_sp,$Gia_mua,$Gia_ban,$So_luong,$Khuyen_mai,$He_dieu_hanh,$Ung_dung,$Cong_nghe_hinh_anh,$Giong_noi,$Remote,$Size,$Nam_sx,$Mo_ta,$filename);   
                            }
                        }  
                    }else{
                        $kq=false;
                    }
                $this->View("Layout_manage",[
                    "page"=>"manage_add_product_View",
                    "cotegory"=>$this->cotegory->List_cotegory(),
                    "result"=>$kq,
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
            
        }
        public function List_product(){
            if(isset($_SESSION['User_Nd'])){
                $this->total=mysqli_num_rows($this->product->List_product());
                $this->limit=10;
                $this->total_page=ceil($this->total/$this->limit);
                $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                $this->start=($this->cr_page-1)*$this->limit;
                $this->result=$this->product->Paging_home($this->start,$this->limit);
                if(isset($_POST['Search'])){
                    $Search=$_POST['Search'];
                    $this->result=$this->product->getProduct_limit($Search,$this->start,$this->limit);
                }
                    if(isset($_GET['Id_sp'])){
                        $Id_sp=$_GET['Id_sp'];
                        $this->product->deleteID($Id_sp);
                        header('location:/mvc/admin/list_product');
                    }
                $this->View("Layout_manage",[
                    "page"=>"manage_list_product_View",
                    "Product"=>$this->result,
                    "Total"=>$this->total_page,
                    "Page"=>$this->cr_page,
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
            
        }
        public function Update_product(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_GET['Id_sp'])){
                    $Id_sp=$_GET['Id_sp'];
                    $this->result=$this->product->product_Id($Id_sp);
                    if(isset($_POST['Update'])){
                        $Ten_sp=$_POST['Ten_sp'];
                        $Gia_mua=$_POST['Gia_mua'];
                        $Gia_ban=$_POST['Gia_ban'];
                        $So_luong=$_POST['So_luong'];
                        $Khuyen_mai=$_POST['Khuyen_mai'];
                        $He_dieu_hanh=$_POST['He_dieu_hanh'];
                        $Ung_dung=$_POST['Ung_dung'];
                        $Cong_nghe_hinh_anh=$_POST['Cong_nghe_hinh_anh'];
                        $Giong_noi=$_POST['Giong_noi'];
                        $Remote=$_POST['Remote'];
                        $Size=$_POST['Size'];
                        $Nam_sx=$_POST['Nam_sx'];
                        $Mo_ta=$_POST['Mo_ta'];
                        if(isset($_FILES['Anh_sp'])){
                            $filename =$_FILES['Anh_sp']['name'];        
                            $file_tmp =$_FILES['Anh_sp']['tmp_name'];					
                            move_uploaded_file($file_tmp,"public/image/".$filename );
                            $this->product->Update_product($Id_sp,$Ten_sp,$Gia_mua,$Gia_ban,$So_luong,$Khuyen_mai,$He_dieu_hanh,$Ung_dung,$Cong_nghe_hinh_anh,$Giong_noi,$Remote,$Size,$Nam_sx,$Mo_ta,$filename);
                        }  
                        header('location:/mvc/admin/List_product'); 
                    }  
                    $this->View("Layout_manage",[
                        "page"=>"manage_update_product_View",
                        "result"=>$this->result,
                        "cotegory"=>$this->cotegory->List_cotegory(),
                    ]);
                }  
            }else{
                header('location:/mvc/admin/Login_User');
            }  
        }
        public function cotegory(){
            if(isset($_SESSION['User_Nd'])){
                $sql=FALSE;
                if(isset($_POST['Btsave'])){
                    $Ten_dm=$_POST["Ten_dm"];
                    if(isset($_FILES['Anh_dm'])){
                        $filename =$_FILES['Anh_dm']['name'];    
                        $file_tmp =$_FILES['Anh_dm']['tmp_name'];					
                            move_uploaded_file($file_tmp,"public/image/".$filename);
                            $sql=$this->cotegory->add_cotegory($Ten_dm,$filename);
                        }
                    }
                $this->View("Layout_manage",
                [
                    "page"=>"manage_add_cotegory_View",
                    "result"=>$sql,
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function List_cotegory(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_GET['Id_dm'])){
                    $Id_dm=$_GET['Id_dm'];
                    $this->cotegory->deleteId_dm($Id_dm);
                    header('location:/mvc/admin/list_cotegory');
                }
                $this->View("Layout_manage",[
                    "page"=>"manage_list_cotegory_View",
                    "cotegory"=>$this->cotegory->List_cotegory(),
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Update_cotegory(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_GET['Id_dm'])){
                    $Id_dm=$_GET['Id_dm'];
                    if(isset($_POST['Save'])){
                        $Ten_dm=$_POST['Ten_dm'];
                        $Anh_dm1=$_POST['Anh_dm1'];
                        if(($_FILES['Anh_dm']==null)){
                            $this->result=$this->cotegory->Update_dm($Id_dm,$Ten_dm,$Anh_dm1); 
                            header('location:/mvc/admin/List_cotegory');
                        }else{
                            $filename =$_FILES['Anh_dm']['name'];    
                            $file_tmp =$_FILES['Anh_dm']['tmp_name'];
                            move_uploaded_file($file_tmp,"public/image/".$filename);
                            $this->result=$this->cotegory->Update_dm($Id_dm,$Ten_dm,$filename);
                            header('location:/mvc/admin/List_cotegory');      
                        }
                    }
                    $this->View("Layout_manage",[
                        "page"=>"manage_Update_cotegory_View",  
                        "result"=>$this->cotegory->Get_Id_dm($Id_dm),
                    ]);
                }
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Login_User(){
            if(isset($_POST['login'])){
                $Username=$_POST['Username'];
                $Password=$_POST['Password'];
                $row=mysqli_fetch_array($this->User->get_User_Nd());
                if(password_verify($Password,$row['Password'])){
                    if(mysqli_num_rows($this->User->Select_User_Nd($Username))==0){
                        $this->alert="Tên tài khoản hoặc mật khẩu không đúng!";
                    }else{
                        $result=mysqli_fetch_array($this->User->Select_User_Nd($Username));
                        if($result['Status']==0){
                            $this->alert="Tài khoản đang bị khóa";
                        }else{
                            $_SESSION['User_Nd']=$Username;  
                            header('location:/mvc/admin/Home');                          
                        }
                    }      
                }else{
                    $this->alert="Tên tài khoản hoặc mật khẩu không đúng!";
                }
            }
            $this->View("Layout_manage_Views",
            [
                "page"=>"manage_login_View",
                "notice"=>$this->alert,
            ]);
        }
        public function Logout(){
            if(isset($_SESSION['User_Nd'])){
                unset($_SESSION['User_Nd']);
                header('location:/mvc/admin/home');
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Home1(){
            if(isset($_SESSION['User_Nd'])){
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y/m/d', time());
                $y=2020;
                $year = date('Y', time());
                $this->result=$this->Order->don_Id_tt($date);
                if(isset($_POST['check'])){
                    $date=$_POST['date'];
                    $this->result=$this->Order->don_Id_tt($date);
                }
                $i=0;
                $sl=0;
                $thanh_tien=0;
                foreach($this->Order->don_Id_tt($date) as $row):
                    $i+=1;
                    foreach($this->Order->get_detail_order_id($row['Id']) as $r):
                        $sl+=$r['So_luong'];
                        $thanh_tien+=$r['Thanh_tien'];
                    endforeach;
                endforeach;
                if(isset($_GET['Search'])){
                    $i=0;
                    $sl=0;
                    $thanh_tien=0;
                    $Search=$_GET['Search'];
                    $date="Năm ".$Search;
                    $this->result=$this->Order->get_Id_year($Search);
                    foreach($this->Order->get_Id_year($Search) as $row):
                        $i+=1;
                        foreach($this->Order->get_detail_order_id($row['Id']) as $r):
                            $sl+=$r['So_luong'];
                            
                            $thanh_tien+=$r['Thanh_tien'];
                        endforeach;
                    endforeach; 
                }  
                if(isset($_GET['SearchT'])){
                    $i=0;
                    $sl=0;
                    $thanh_tien=0;
                    $Search=$_GET['SearchT'];
                    $year1 = date('Y-0'.$Search, time());
                    $date="Tháng ".$Search;
                    $this->result=$this->Order->get_Id_year($year1);
                    foreach($this->Order->get_Id_year($year1) as $row):
                        $i+=1;
                        foreach($this->Order->get_detail_order_id($row['Id']) as $r):
                            $sl+=$r['So_luong'];
                            $thanh_tien+=$r['Thanh_tien'];
                        endforeach;
                    endforeach; 
                }              
                $this->View("Layout_manage",
                [
                    "page"=>"manage_home_View",
                    "date"=>$date,
                    "result"=>$this->result,
                    "pttt"=>$this->Order->getMethod(),
                    "ttdh"=>$this->Order->Get_tt_dh(),
                    "tt"=>$this->Order->Get_tt_dh(),
                    "T_sl_don"=>$i,
                    "T_sl_sp"=>$sl,
                    "Thanh_t"=>$thanh_tien,
                    "y_to"=>$y,
                    "year_from"=>$year,
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function List_customer(){
            if(isset($_SESSION['User_Nd'])){
                $this->total=mysqli_num_rows($this->User->getPass());
                $this->limit=10;
                $this->total_page=ceil($this->total/$this->limit);
                $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                $this->start=($this->cr_page-1)*$this->limit;
                $this->result=$this->User->Get_User($this->start,$this->limit);
                if(isset($_POST['Search'])){
                    $Search=$_POST['Search'];
                    $this->result=$this->User->Search_User($Search);
                }
                    if(isset($_GET['Id_kh'])){
                        $Id_kh=$_GET['Id_kh'];
                        $this->User->delete_User($Id_kh);
                        header('location:/mvc/admin/list_customer');
                    }
                $this->View("Layout_manage",[
                    "page"=>"manage_list_customer_View",
                    "result"=>$this->result,
                    "Total"=>$this->total_page,
                    "Page"=>$this->cr_page,
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Update_customer(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_GET['Id_kh'])){
                    $Id_kh=$_GET['Id_kh'];
                    if(isset($_POST['Update'])){
                        $Username=$_POST['Username'];
                        $Fullname=$_POST['Fullname'];
                        $Email=$_POST['Email'];
                        $Number_phone=$_POST['Number_phone'];
                        $Address=$_POST['Address'];
                        $Status=$_POST['Status'];
                        $this->User->Update_UserID($Username,$Fullname,$Email,$Number_phone,$Address,$Status);
                        header('location:/mvc/admin/list_customer');
                    }
                    $this->View("Layout_manage",[
                        "page"=>"manage_update_user_View",
                        "result"=>$this->User->Get_User_ID($Id_kh),
                    ]);
                }
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        // public $So_luong_ban=0;
        public function List_Order(){
            if(isset($_SESSION['User_Nd'])){
                $this->total=mysqli_num_rows($this->Order->Get_ddh());
                $this->limit=15;
                $this->total_page=ceil($this->total/$this->limit);
                $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                $this->start=($this->cr_page-1)*$this->limit;
                $this->result=$this->Order->Get_ddh_limit($this->start,$this->limit);
                if(isset($_POST['Search'])){
                    $Search=$_POST['Search'];
                    $this->result=$this->Order->Search_dh($Search);
                }
                if(isset($_GET['Id_dh'])){
                    $Id_dh=$_GET['Id_dh'];
                    if(mysqli_num_rows($this->Order->Get_ddh())!=0){
                        foreach($this->Order->get_detail_order_id($Id_dh) as $k){
                            if(mysqli_num_rows($this->Order->check_Id_sp_ban($k['Id_sp']))!=0){
                                foreach($this->Order->get_sl_ban() as $r){
                                    if($r['Id_sp']==$k['Id_sp']){
                                        $Sl=$r['So_luong_ban']-$k['So_luong'];
                                        if($Sl<0){
                                            $Sl=0;
                                        }
                                        $this->Order->update_sl_ban($r['Id_sp'],$Sl);
                                    }
                                }
                            }else{
                                $this->So_luong_ban=$k['So_luong'];
                                $this->Order->insert_sp_ban($k['Id_sp'],$this->So_luong_ban);
                            }      
                        }
                    }
                    $this->Order->Delete_dh($Id_dh);
                    $this->Order->delete_dh_ctdh($Id_dh);
                    header('location:/mvc/admin/List_Order');
                }
                if(isset($_GET['Id_tt'])){
                    if(isset($_GET['Id_hd'])){
                    $Id_tt=$_GET['Id_tt'];
                    $Id_dh=$_GET['Id_hd'];
                    $this->Order->update_tt($Id_tt,$Id_dh);
                    if(($Id_tt)==4){
                        if(mysqli_num_rows($this->Order->Get_ddh())!=0){
                                foreach($this->Order->get_detail_order_id($Id_dh) as $k){
                                    if(mysqli_num_rows($this->Order->check_Id_sp_ban($k['Id_sp']))!=0){
                                        foreach($this->Order->get_sl_ban() as $r){
                                            if($r['Id_sp']==$k['Id_sp']){
                                                $Sl=$r['So_luong_ban']+$k['So_luong'];
                                                $this->Order->update_sl_ban($r['Id_sp'],$Sl);
                                            }
                                        }
                                    }else{
                                        $this->So_luong_ban=$k['So_luong'];
                                        $this->Order->insert_sp_ban($k['Id_sp'],$this->So_luong_ban);
                                    }      
                                }
                        }
                    }
                    elseif(($Id_tt)==1 || ($Id_tt)==2 || ($Id_tt)==3 || ($Id_tt)==5){
                        if(mysqli_num_rows($this->Order->Get_ddh())!=0){
                            foreach($this->Order->get_detail_order_id($Id_dh) as $k){
                                if(mysqli_num_rows($this->Order->check_Id_sp_ban($k['Id_sp']))!=0){
                                    foreach($this->Order->get_sl_ban() as $r){
                                        if($r['Id_sp']==$k['Id_sp']){
                                            $Sl=$r['So_luong_ban']-$k['So_luong'];
                                            if($Sl<0){
                                                $Sl=0;
                                            }
                                            $this->Order->update_sl_ban($r['Id_sp'],$Sl);
                                        }
                                    }
                                }else{
                                    $this->So_luong_ban=$k['So_luong'];
                                    $this->Order->insert_sp_ban($k['Id_sp'],$this->So_luong_ban);
                                }      
                            }
                        }
                    }  
                    header('location:/mvc/admin/List_Order');
                    }
                }
                if(isset($_GET['Id_tinh_trang'])){
                    $Id_tt=$_GET['Id_tinh_trang'];
                    $this->result=$this->Order->get_Idtt($Id_tt);
                }
                $this->View("Layout_manage",[
                    "page"=>"manage_list_order_View",
                    "result"=>$this->result,
                    "Total"=>$this->total_page,
                    "Page"=>$this->cr_page,
                    "pttt"=>$this->Order->getMethod(),
                    "ttdh"=>$this->Order->Get_tt_dh(),
                    "tt"=>$this->Order->Get_tt_dh(),
                    "tt_1"=>$this->Order->Get_tt_dh(),
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Add_order(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_POST['add_order'])){
                    $Id_kh=$_POST['Id_kh'];
                    $Fullname=$_POST['Fullname'];
                    $Id_pt=$_POST['pttt'];
                    $Id_sp=$_POST['Id_sp'];
                    $Ngay_lap=$_POST['Ngay_lap'];
                    $Tinh_trang=$_POST['Tinh_trang'];
                    $So_luong=$_POST['So_luong'];
                    $pr=mysqli_fetch_array($this->product->product_Id($Id_sp));
                    $Gia_ban_sp=$pr['Gia_ban'];
                    $Khuyen_mai=$pr['Khuyen_mai'];
                    $Don_gia=($Gia_ban_sp*(100-$Khuyen_mai)/100)*$So_luong;
                    $Thanh_tien=($Gia_ban_sp*(100-$Khuyen_mai)/100)*$So_luong;
                    if($this->Order->Order_method($Id_kh,$Fullname,$Id_pt,$Don_gia,$Ngay_lap,$Tinh_trang)==true){
                        $tb_don_dh=mysqli_fetch_array($this->Order->getMethodId());
                        $Id_dh=$tb_don_dh['Id'];
                        $this->Order->Insert_ct_dh($Id_dh,$Id_sp,$Gia_ban_sp,$Khuyen_mai,$So_luong,$Thanh_tien);
                        if(($Tinh_trang)==4){
                            if(mysqli_num_rows($this->Order->Get_ddh())!=0){
                                if(mysqli_num_rows($this->Order->check_Id_sp_ban($Id_sp))!=0){
                                    foreach($this->Order->get_sl_ban() as $r){
                                        if($r['Id_sp']==$Id_sp){
                                            $Sl=$r['So_luong_ban']+$So_luong;
                                            $this->Order->update_sl_ban($r['Id_sp'],$Sl);
                                        }
                                    }   
                                }else{
                                    $this->So_luong_ban=$So_luong;
                                    $this->Order->insert_sp_ban($Id_sp,$this->So_luong_ban);
                                }      
                            }
                        }
                        header('location:/mvc/admin/List_Order');
                    }
                }
                $this->View("Layout_manage",[
                    "page"=>"manage_add_order_View",
                    "tb_kh"=>$this->User->getPass(),
                    "Pttt"=>$this->Order->getMethod(),
                    "product"=>$this->product->List_product(),
                    "tt_dh"=>$this->Order->Tinh_trang_dh(),
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Detail_order(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_GET['Id_dh'])){
                    $Id_dh=$_GET['Id_dh'];
                    if(isset($_GET['Id_ct'])){
                        $Id_ct=$_GET['Id_ct'];
                        $this->Order->delete_ctd($Id_ct);
                        $So_luong=$_GET['So_luong'];
                        $Id_sp=$_GET['Id_sp'];
                        if(mysqli_num_rows($this->Order->Get_ddh())!=0){
                                if(mysqli_num_rows($this->Order->check_Id_sp_ban($Id_sp))!=0){
                                    foreach($this->Order->get_sl_ban() as $r){
                                        if($r['Id_sp']==$Id_sp){
                                            $Sl=$r['So_luong_ban']-$So_luong;
                                            if($Sl<0){
                                                $Sl=0;
                                            }
                                            $this->Order->update_sl_ban($r['Id_sp'],$Sl);
                                        }
                                    }
                                }else{
                                    $this->So_luong_ban=$So_luong;
                                    $this->Order->insert_sp_ban($Id_sp,$this->So_luong_ban);
                                }      
                        }
                        $tong_don=0;
                        foreach($this->Order->get_detail_order_id($Id_dh) as $r):
                            $tong_don+=$r['Thanh_tien'];
                        endforeach;
                        $n=$tong_don;
                        $this->Order->update_gia_don($n,$Id_dh);
                        header('location:/mvc/admin/Detail_order&Id_dh='.$Id_dh);
                    }
                    $this->View("layout_manage",[
                        "page"=>"manage_detail_order_View",
                        "don"=>$this->Order->get_order_Id($Id_dh),
                        "pttt"=>$this->Order->getMethod(),
                        "ttdh"=>$this->Order->Get_tt_dh(),
                        "ct_don"=>$this->Order->get_detail_order_id($Id_dh),
                        "product"=>$this->product->List_product(),
                    ]);   
                }
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function add_detail_ord(){
            if(isset($_SESSION['User_Nd'])){
                if(isset($_GET['Id_dh'])){
                    $Id_dh=$_GET['Id_dh'];
                    if(isset($_POST['add_detail'])){
                        $Id_sp=$_POST['Id_sp'];
                        $row=mysqli_fetch_array($this->product->product_Id($Id_sp));
                        $Khuyen_mai=$row['Khuyen_mai'];
                        $Gia_ban_sp=$row['Gia_ban'];
                        $So_luong=$_POST['So_luong'];
                        $Thanh_tien=$Gia_ban_sp*(100-$Khuyen_mai)/100*$So_luong;
                        $this->Order->Insert_ct_dh($Id_dh,$Id_sp,$Gia_ban_sp,$Khuyen_mai,$So_luong,$Thanh_tien);
                        $tong_don=0;
                        foreach($this->Order->get_detail_order_id($Id_dh) as $r):
                            $tong_don+=$r['Thanh_tien'];
                        endforeach;
                        $n=$tong_don;
                        $this->Order->update_gia_don($n,$Id_dh);
                        $luong=mysqli_fetch_array($this->Order->get_order_Id($Id_dh));
                        $Id_tt=$luong['Tinh_trang'];
                            if(($Id_tt)==4){
                                if(mysqli_num_rows($this->Order->Get_ddh())!=0){
                                    if(mysqli_num_rows($this->Order->check_Id_sp_ban($Id_sp))!=0){
                                        foreach($this->Order->get_sl_ban() as $r){
                                            if($r['Id_sp']==$Id_sp){
                                                $Sl=$r['So_luong_ban']+$So_luong;
                                                $this->Order->update_sl_ban($r['Id_sp'],$Sl);
                                            }
                                        }   
                                    }else{
                                        $this->So_luong_ban=$So_luong;
                                        $this->Order->insert_sp_ban($Id_sp,$this->So_luong_ban);
                                    }      
                                }
                            } 
                        header('location:/mvc/admin/Detail_order&Id_dh='.$Id_dh);
                    }
                    $this->View("Layout_manage",[
                        "page"=>"manage_add_detail_ord_View",
                        "product"=>$this->product->List_product(),
                        "Id_dh"=>$Id_dh,
                    ]);
                }
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function Inventory(){
            if(isset($_SESSION['User_Nd'])){
                $this->total=mysqli_num_rows($this->product->List_product());
                $this->limit=8;
                $this->total_page=ceil($this->total/$this->limit);
                $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                $this->start=($this->cr_page-1)*$this->limit;
                $this->result=$this->product->Paging_home($this->start,$this->limit);
                $Loi=0;
                $Xuat=0;
                $Nhap=0;
                foreach($this->product->List_product() as $row):
                    $Gia_nhap=$row['Gia_mua'];
                    $Khuyen_mai=$row['Khuyen_mai'];
                    $Gia_xuat=$row['Gia_ban']*(100-$Khuyen_mai)/100;
                    $So_luong_nhap=$row['So_luong'];
                    foreach($this->Order->get_sl_ban() as $r):
                        if(($r['Id_sp'])==($row['Id_sp'])) :
                            $So_luong_xuat=$r['So_luong_ban'];
                            $Tong_loi1=$Gia_xuat*$So_luong_xuat;
                        endif;
                    endforeach;
                    $So_luong_ton=$So_luong_nhap-$So_luong_xuat;
                    $Tong_von=$Gia_nhap*$So_luong_nhap;
                    $Tong_gtri=$Gia_xuat*$So_luong_nhap;
                    $Loi+=$Tong_loi1;
                    $Xuat+=$Tong_von;
                    $Nhap+=$Tong_gtri;
                endforeach; 
                if(isset($_POST['Search'])){
                    $Search=$_POST['Search'];
                    $this->result=$this->product->getProduct_limit($Search,$this->start,$this->limit);
                }
                $this->View("Layout_manage",[
                    "page"=>"manage_inventory_View",
                    "result"=>$this->result,
                    "don_dh"=>$this->Order->Get_ddh(),
                    "sl_ban"=>$this->Order->get_sl_ban(),
                    "sl_ton"=>$this->Order->get_sl_ban(),
                    "Total"=>$this->total_page,
                    "Page"=>$this->cr_page,
                    "T_nhap"=>$Nhap,
                    "T_xuat"=>$Xuat,
                    "T_loi"=>$Loi,
                ]);
            }else{
                header('location:/mvc/admin/Login_User');
            }
        }
        public function List_Staff(){
            $row=mysqli_fetch_array($this->User->check($_SESSION['User_Nd']));
                $tt=$row['Chuc_vu'];
                if($tt==1){ 
                    if(isset($_GET['Id_nd'])){
                        $Id=$_GET['Id_nd'];
                        $this->User->deleteId_nd($Id);
                        header('location:/mvc/admin/List_Staff');
                    }
                    if(isset($_GET['Id_mk'])){
                        $Status=$_GET['Id_mk'];
                        $Id=$_GET['Id'];
                        $this->User->update_status($Status,$Id);
                        header('location:/mvc/admin/List_Staff');
                    }
                    $this->View("Layout_manage",[
                        "page"=>"manage_list_staff_View",
                        "get_staff"=>$this->User->get_staff(),
                        "get_User_Nd"=>$this->User->get_User_Nd(),
                    ]);
            }else{
                header('location:/mvc/admin/Home1');
            }
        }
        public function Add_Staff(){ 
                $row=mysqli_fetch_array($this->User->check($_SESSION['User_Nd']));
                $tt=$row['Chuc_vu'];
                if($tt==1){                
                    if(isset($_POST['submit'])){
                        $this->Username=$_POST['Username'];
                        $this->Password=$_POST['Password'];
                        $Password=password_hash($this->Password,PASSWORD_DEFAULT);
                        $Fullname=$_POST['Fullname'];
                        $Number_phone=$_POST['Number_phone'];
                        $Chuc_vu=$_POST['Chuc_vu'];
                        if(mysqli_num_rows($this->User->Select_User_Nd($this->Username))!=0){
                            $this->result=false;
                        }elseif(mysqli_num_rows($this->User->Select_User_Nd($this->Username))==0){
                            $this->result=$this->User->Insert_User_Nd($this->Username,$Password,$Fullname,$Number_phone,$Chuc_vu);
                        }
                    }
                    $this->View("Layout_manage",[
                        "page"=>"manage_add_staff_View",
                        "result"=>$this->result,
                        "Username"=>$this->Username,
                        "Password"=>$this->Password,
                    ]);
                }else{
                    header('location:/mvc/admin/Home1');
                }
        }
    }
?>