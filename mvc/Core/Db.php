<?php
    class Db{
        public $con;
        protected $servername="localhost";
        protected $username="root";
        protected $password="";
        protected $dbname="ql_shop";

        function __construct()
        {
            $this->con=mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbname);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }
        //thực hiện lệnh truy vấn
        public function execute($sql){
            $this->result= $this->con->query($sql);
            return $this->result;
        }
        //phương thức lấy dữ liệu
        public function getData(){
            if($this->result){
                $data=mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }
        //phương thức lấy toàn bộ dữ liệu
        public function getAllData(){
            if(!$this->result){
                $data=0;
            }else{
                while($datas=$this->result){
                    $data[]=$datas;
                }
            }
            return $data;
        }
    }
?>