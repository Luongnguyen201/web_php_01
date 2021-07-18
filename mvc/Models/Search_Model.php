<?php
    class Search_Model extends Db{

        //Lấy dữ liệu từ bàng tb_timkiem_gia    
        public function Select_search(){
            $sql="SELECT * FROM tb_timkiem_gia";
            return $this->execute($sql);
        }
    }
?>