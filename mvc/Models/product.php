<?php
    class product extends Db{
        //lấy danh sách sản phẩm
        public function List_product(){
            $sql="SELECT * FROM tb_sanpham";
            return $this->execute($sql);
        }
        //thêm sản phẩm
        public function Add_product($Id_dm,$Ten_sp,$Gia_mua,$Gia_ban,$So_luong,$Khuyen_mai,$He_dieu_hanh,$Ung_dung,$Cong_nghe_hinh_anh,$Giong_noi,$Remote,$Size,$Nam_sx,$Mo_ta,$Anh_sp){
            $sql="INSERT INTO tb_sanpham(Id_dm,Ten_sp,Gia_mua,Gia_ban,So_luong,Khuyen_mai,He_dieu_hanh,Ung_dung,Cong_nghe_hinh_anh,Giong_noi,Remote,Size,Nam_sx,Mo_ta,Anh_sp) Values('$Id_dm','$Ten_sp','$Gia_mua','$Gia_ban','$So_luong','$Khuyen_mai','$He_dieu_hanh','$Ung_dung','$Cong_nghe_hinh_anh','$Giong_noi','$Remote','$Size','$Nam_sx','$Mo_ta','$Anh_sp')";      
            $result=FALSE;
            if($this->execute($sql)){
                $result=TRUE;
            }
            return json_decode($result);
        }

        //Update sản phẩm
        public function Update_product($Id_sp,$Ten_sp,$Gia_mua,$Gia_ban,$So_luong,$Khuyen_mai,$He_dieu_hanh,$Ung_dung,$Cong_nghe_hinh_anh,$Giong_noi,$Remote,$Size,$Nam_sx,$Mo_ta,$Anh_sp){
            $sql="UPDATE tb_sanpham SET Ten_sp='$Ten_sp', Gia_mua='$Gia_mua', Gia_ban='$Gia_ban',So_luong='$So_luong',Khuyen_mai='$Khuyen_mai',He_dieu_hanh='$He_dieu_hanh',Ung_dung='$Ung_dung',Cong_nghe_hinh_anh='$Cong_nghe_hinh_anh',Giong_noi='$Giong_noi',Remote='$Remote',Size='$Size',Nam_sx='$Nam_sx',Mo_ta='$Mo_ta',Anh_sp='$Anh_sp' WHERE Id_sp='$Id_sp'";
            return $this->execute($sql);
        }
        //lấy danh sách sp theo danh mục
        public function Get_product_cotegory($Id_dm){
            $sql="SELECT * FROM tb_sanpham WHERE Id_dm='$Id_dm'";
            return $this->execute($sql);
        }
        //lấy danh sách sản phẩm theo ID
        public function product_Id($Id_sp){
            $sql="SELECT * FROM tb_sanpham WHERE Id_sp='$Id_sp'";
            return  $this->execute($sql);
        }
        public function product_Cart($list){
            $sql="SELECT * FROM tb_sanpham WHERE Id_sp in ($list)";
            return $this->execute($sql);
        }
        //lấy danh sách có mã khuyến mãi từ cáo đến thấp
        public function ad_product(){
            $sql="SELECT * FROM tb_sanpham ORDER BY Khuyen_mai DESC";
            return $this->execute($sql);
        }
        //Trả về tìm kiếm sp và so sánh giá sản phẩm theo 2 điệu kiện: 
        public function Compare1($From,$Id_dm,$start,$limit){
            $sql="SELECT * FROM tb_sanpham WHERE Gia_ban>=$From and Id_dm=$Id_dm LIMIT $start,$limit";
            return $this->execute($sql);
        }
        public function Compare11($From,$Id_dm){
            $sql="SELECT * FROM tb_sanpham WHERE Gia_ban>=$From and Id_dm=$Id_dm";
            return $this->execute($sql);
        }
        public function Compare22($From,$To,$Id_dm){
            $sql="SELECT * FROM tb_sanpham WHERE Gia_ban>=$From and Gia_ban<=$To and Id_dm=$Id_dm";
            return $this->execute($sql);
        }
        public function Compare2($From,$To,$Id_dm,$start,$limit){
            $sql="SELECT * FROM tb_sanpham WHERE Gia_ban>=$From and Gia_ban<=$To and Id_dm=$Id_dm LIMIT $start,$limit";
            return $this->execute($sql);
        }
        //Trả về tìm kiếm sản phẩm bằng keyword
        public function getProduct($Keyword){
            $sql="SELECT * FROM tb_sanpham  WHERE Ten_sp like'%".$Keyword."%' OR Gia_ban like'%".$Keyword."%' OR He_dieu_hanh like'%".$Keyword."%' OR Ung_dung like'%".$Keyword."%' OR Cong_nghe_hinh_anh like'%".$Keyword."%'
             OR Giong_noi like'%".$Keyword."%' OR Remote like'%".$Keyword."%' OR Size like'%".$Keyword."%' OR Nam_sx like'%".$Keyword."%' "; 
            return $this->execute($sql);
        }

        //Trả về tìm kiếm so sách Size sản phẩm
        public function Compare_size1($From, $Id_dm,$start,$limit){
            $sql="SELECT * FROM tb_sanpham  WHERE Id_dm='$Id_dm' and Size>='$From'  LIMIT $start,$limit";
            return $this->execute($sql);
        }
        public function Compare_size2($From,$To,$Id_dm,$start,$limit){
            $sql="SELECT * FROM tb_sanpham WHERE Id_dm='$Id_dm' and Size>='$From' and Size<='$To'  LIMIT $start,$limit";
            return $this->execute($sql);
        }
        //Trả về tìm kiếm sp theo năm sản xuất
        public function Compare_Year($Id_dm,$Year,$start,$limit){
            $sql="SELECT * FROM tb_sanpham WHERE Id_dm='$Id_dm' and Nam_sx='$Year' LIMIT $start,$limit";
            return $this->execute($sql);
        }
        //Phân trang trong danh sách sản phẩm theo danh mục
        public function Paging($start, $limit,$Id_dm){
            $sql="SELECT * FROM tb_sanpham WHERE Id_dm=$Id_dm LIMIT $start,$limit ";
            return $this->execute($sql);
        }
        //phân trang trong HOME
        public function Paging_home($start, $limit){
            $sql="SELECT * FROM tb_sanpham LIMIT $start,$limit ";
            return $this->execute($sql);
        }
        //Xóa sản phẩm theo ID trong csdl
        public function deleteID($Id_sp){
            $sql="DELETE FROM tb_sanpham WHERE Id_sp=$Id_sp";
            $this->execute($sql);
        }
        public function getProduct_limit($Keyword,$start,$limit){
            $sql="SELECT * FROM tb_sanpham  WHERE Ten_sp like'%".$Keyword."%' OR Gia_ban like'%".$Keyword."%' OR He_dieu_hanh like'%".$Keyword."%' OR Ung_dung like'%".$Keyword."%' OR Cong_nghe_hinh_anh like'%".$Keyword."%'
             OR Giong_noi like'%".$Keyword."%' OR Remote like'%".$Keyword."%' OR Size like'%".$Keyword."%' OR Nam_sx like'%".$Keyword."%' LIMIT $start,$limit "; 
            return $this->execute($sql);
        }
}
?>
