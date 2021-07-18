<?php
    class Order_model extends Db{
        //Lấy all dữ liệu phương thức thanh toán;
        public function getMethod()
        {
            $sql="SELECT * FROM tb_pttt";
            return $this->execute($sql);
        }
        //thêm đơn hàng vào bảng đơn hàng trong csdl
        public function Order_method($methodId,$Id_kh,$Fullname,$Gia_don,$date,$Status){
            $sql="INSERT INTO tb_don_dh(Id_kh,Fullname,Id_pttt,Gia_don,Ngay_lap,Tinh_trang) VALUES('$methodId','$Id_kh','$Fullname','$Gia_don','$date','$Status')";
            $resutl=false;
            if($this->execute($sql)){
                $resutl=true;
            }
            return json_decode($resutl);
        }
        //lấy Id trong bảng đơn hàng (tb_don_dh)
        public function getMethodId(){
            $sql="SELECT Id FROM tb_don_dh ORDER BY Id desc limit 1 ";
            return $this->execute($sql);
        }
        //Insert chi tiết đơn hàng cho đơn hàng(tb_ct_dh)
        public function Insert_ct_dh($Id_dh,$Id_sp,$Gia_ban_sp,$Khuyen_mai,$So_luong,$Thanh_tien){
            $sql="INSERT INTO tb_ct_ddh(Id_dh,Id_sp,Gia_ban_sp,Khuyen_mai,So_luong,Thanh_tien)VALUES('$Id_dh','$Id_sp','$Gia_ban_sp','$Khuyen_mai','$So_luong','$Thanh_tien')";
            $resutl=false;
            if($this->execute($sql)){
                $resutl=true;
            }
            return json_decode($resutl);
        }
        public function Get_ddh(){
            $sql="SELECT * FROM tb_don_dh";
            return $this->execute($sql);
        }
        public function Get_ddh_limit($Start,$limit){
            $sql="SELECT * FROM tb_don_dh ORDER BY Id DESC LIMIT $Start,$limit";
            return $this->execute($sql);
        }
        public function Get_tt_dh(){
            $sql="SELECT * FROM tb_tt_dh";
            return $this->execute($sql);
        }
        public function Search_dh($Search){
            $sql="SELECT * FROM tb_don_dh WHERE Id_kh like '%".$Search."%' OR Gia_don like '%".$Search."%' OR Ngay_lap like '%".$Search."%' OR Fullname like '%".$Search."%'";
            return $this->execute($sql);
        }
        public function Delete_dh($Id){
            $sql="DELETE FROM tb_don_dh WHERE Id='$Id'";
            return $this->execute($sql);
        }
        public function Tinh_trang_dh(){
            $sql="SELECT * FROM tb_tt_dh";
            return $this->execute($sql);
        }
        public function Get_Id_hd_ct($Id_dh){
            $sql="SELECT * FROM tb_ct_ddh WHERE Id_dh='$Id_dh'";
            return $this->execute($sql);
        }
        public function get_order_Id($Id_dh){
            $sql="SELECT * FROM tb_don_dh WHERE Id='$Id_dh'";
            return $this->execute($sql);
        }
        public function get_detail_order_id($Id_dh){
            $sql="SELECT * FROM tb_ct_ddh WHERE Id_dh='$Id_dh'";
            return $this->execute($sql);
        }
        public function delete_ctd($Id_ct){
            $sql="DELETE FROM tb_ct_ddh WHERE Id='$Id_ct'";
            return $this->execute($sql);
        }
        public function update_gia_don($Thanh_tien,$Id_dh){
            $sql="UPDATE tb_don_dh SET Gia_don='$Thanh_tien' WHERE Id='$Id_dh'";
            $resutl=false;
            if($this->execute($sql)){
                $resutl=true;
            }
            return json_decode($resutl);
        }
        public function update_tt($Id_tt,$Id_dh){
            $sql="UPDATE tb_don_dh SET Tinh_trang='$Id_tt' WHERE Id='$Id_dh'";
            $resutl=false;
            if($this->execute($sql)){
                $resutl=true;
            }
            return json_decode($resutl);
        }
        public function delete_dh_ctdh($Id_dh){
            $sql="DELETE FROM tb_ct_ddh WHERE Id_dh='$Id_dh'";
            return $this->execute($sql);
        }

        public function get_sl_ban(){
            $sql="SELECT * FROM tb_sp_ban";
            return $this->execute($sql);
        }
        public function update_sl_ban($Id,$So_luong){
            $sql="UPDATE tb_sp_ban SET So_luong_ban='$So_luong' WHERE Id_sp='$Id'";
            return $this->execute($sql);
        }
        public function insert_sp_ban($Id_sp,$So_luong){
            $sql="INSERT INTO tb_sp_ban (Id_sp,So_luong_ban) VALUES ('$Id_sp','$So_luong')";
            return $this->execute($sql);
        }
        public function check_Id_sp_ban($Id_sp){
            $sql="SELECT * FROM tb_sp_ban WHERE Id_sp='$Id_sp'";
            return $this->execute($sql);
        }
        public function don_Id_tt($date){
            $sql="SELECT * FROM tb_don_dh WHERE Tinh_trang!='5' and Ngay_lap ='$date'";
            return $this->execute($sql);
        }
        public function get_Id_year($Search){
            $sql="SELECT * FROM tb_don_dh WHERE Tinh_trang!='5' and  Ngay_lap LIKE '%".$Search."%'";
            return $this->execute($sql);
        }
        public function get_order_us_desc($Id){
            $sql="SELECT * FROM tb_don_dh WHERE Id_kh='$Id' ORDER BY Id desc ";
            return $this->execute($sql);
        }
        public function get_ct_ddh(){
            $sql="SELECT * FROM tb_ct_ddh";
            return $this->execute($sql);
        }
        public function get_dh_id_kh($Id,$Id_tt){
            $sql="SELECT * FROM tb_don_dh WHERE Id_kh='$Id' and Tinh_trang='$Id_tt'";
            return $this->execute($sql);
        }
        public function update_tt_id($Id){
            $sql="UPDATE tb_don_dh SET Tinh_trang='5' where Id='$Id' ";
            return $this->execute($sql);
        }
        public function get_Idtt($Id){
            $sql="SELECT * FROM tb_don_dh WHERE Tinh_trang='$Id'";
            return $this->execute($sql);
        }
    }
?> 
