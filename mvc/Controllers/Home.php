<?php
    class Home extends Controller{
        public $List_cotegory;
        public $List_product;
        public $Search;
        public $total;
        public $limit;
        public $total_page;
        public $cr_page;
        public $start;
        public function __construct(){
            $this->List_cotegory = $this->Model("cotegory");
            $this->List_product= $this->Model("product");
        }
        public function Home1(){
            $this->total=mysqli_num_rows($this->List_product->List_product());
            $this->limit=24;
            $this->total_page=ceil($this->total/$this->limit);
            $this->cr_page=isset($_GET['page']) ? $_GET['page'] : 1 ;
            $this->start=($this->cr_page-1)*$this->limit;
            $this->Search=$this->List_product->Paging_home($this->start,$this->limit);
            if(isset($_POST['Search'])){
                $Search=$_POST['Search'];
                $this->Search=$this->List_product->getProduct($Search);
            }
            $this->View("layout_Home",
            [
                "page"=>"list_Home",
                "List_cotegory"=>$this->List_cotegory->List_cotegory(),
                "List_product"=>$this->Search,  
                "Total"=>$this->total_page,
                "Page"=>$this->cr_page, 
                "ad_product"=>$this->List_product->ad_product(),          
            ]);
        }
    }
?>