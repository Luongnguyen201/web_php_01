<?php 
    class List_product extends Controller{
        public $cotegory;
        public $product;
        public $Search_price;
        public $result;
        public $total;
        public $limit;
        public $total_page;
        public $cr_page;
        public $start;
        public function __construct(){
            $this->cotegory=$this->Model("cotegory");
            $this->product=$this->Model("product");
            $this->Search_price= $this->Model("Search_Model");
        }
        public function product(){
            if(isset($_GET['Id_dm'])){
                $Id_dm=$_GET['Id_dm']; 
                //Phân trang sản phẩm theo danh mục
                $this->total=mysqli_num_rows($this->product->Get_product_cotegory($Id_dm));
                $this->limit=12;
                $this->total_page=ceil($this->total/$this->limit);
                $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                $this->start=($this->cr_page-1)*$this->limit;
                $this->result=$this->product->Paging($this->start,$this->limit,$Id_dm);
                //Tìm kiếm sản phẩm théo giá
                if(isset($_GET['Price'])){
                    $rangePrice=$_GET['Price'];
                    $range=preg_split('[\s]', $rangePrice);
                    $From=0;
                    $To=0;
                    if($range[0]=='Over')
                    {
                        $From=$range[1];
                    }else{
                        $range1=preg_split('[\-]', $range[0]);
                        $From=$range1[0];
                        $To=$range1[1];
                    }
                    $From*=32000;
                    $To*=32000;
                    if($To==0){
                        $this->total=mysqli_num_rows($this->product->Compare11($From,$Id_dm));
                        $this->limit=12;
                        $this->total_page=ceil($this->total/$this->limit);
                        $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                        $this->start=($this->cr_page-1)*$this->limit;
                        $this->result=$this->product->Compare1($From,$Id_dm,$this->start,$this->limit);
                    }else{
                        $this->total=mysqli_num_rows($this->product->Compare22($From,$To,$Id_dm));
                        $this->limit=12;
                        $this->total_page=ceil($this->total/$this->limit);
                        $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
                        $this->start=($this->cr_page-1)*$this->limit;
                        $this->result=$this->product->Compare2($From,$To,$Id_dm,$this->start,$this->limit);
                    }
                }
                //Tìm kiếm sản phẩm theo Size 
                if(isset($_GET['Size'])){
                    $Size=trim($_GET['Size']);
                    $Ranges=preg_split('[/s]',$Size);
                    $From=0;
                    $To=0;
                    if($Ranges[0]=='70 inch')
                    {
                        $From=$Ranges[0];
                    }else{
                        $Ranges1=preg_split('[\-]', $Ranges[0]);
                        $From=$Ranges1[0];
                        $To=$Ranges1[1];
                    }
                    if($To==0){
                        $this->result=$this->product->Compare_size1($From,$Id_dm,$this->start,$this->limit);
                    }else{
                        $this->result=$this->product->Compare_size2($From,$To,$Id_dm,$this->start,$this->limit);
                    }
                }
                //Tìm kiếm sản phẩm theo năm sản xuất
                if(isset($_GET['Year'])){
                    $Year=$_GET['Year'];
                    $this->result=$this->product->Compare_Year($Id_dm,$Year,$this->start,$this->limit);
                }
                
                //Hiện thị ra VIEWS
                $this->View("Layout_list_product",[
                    "page"=>"List_product",
                    "result"=>$this->result,
                    "List_price"=>$this->Search_price->Select_search(),   
                    "Id_dm"=>$Id_dm,
                    "Total"=>$this->total_page,
                    "Page"=>$this->cr_page,
                    "ad_product"=>$this->product->ad_product(),
                ]);
            }
        }
    }
?>