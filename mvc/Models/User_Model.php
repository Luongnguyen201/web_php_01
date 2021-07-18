<?php
    class User_Model extends Db{
        //Thêm User
        public function Insert_User($Username,$Password,$Fullname,$Email,$Number_phone,$Address){
            $sql="INSERT INTO tb_khachhang(Username,Password,Fullname,Email,Number_phone,Address) VALUES('$Username','$Password','$Fullname','$Email','$Number_phone','$Address')";
            $result=FALSE;
            if($this->execute($sql)){
                $result=True;
            }
            return json_decode($result);
        }
        //Hiện thị User với đk
        public function Select_User($Username){
            $sql="SELECT * FROM tb_khachhang WHERE Username='$Username'";
            return $this->execute($sql);
        }

        //Trả về thông tin khách hàng
        public function getPass(){
            $sql="SELECT * FROM tb_khachhang";
            return $this->execute($sql);    
        }
        //Cập nhật thông tin khách hàng
        public function Update_User($Username,$Fullname,$Email,$Number_phone,$Address){
            $sql="UPDATE tb_khachhang  SET Fullname='$Fullname', Email='$Email',Number_phone='$Number_phone',Address='$Address' WHERE  Username='$Username'";
            return $this->execute($sql);
        }
        //Insert bình luận vào bảng tb_binhluan
        public function Insert_bl($Id_sp,$Id_kh,$Username,$Binh_luan,$Anh_bl,$date){
            $sql="INSERT INTO tb_binhluan(Id_sp,Id_kh,Username,Binh_luan,Anh_bl,Ngay) VALUES ('$Id_sp','$Id_kh','$Username','$Binh_luan','$Anh_bl','$date')";
            return $this->execute($sql);
        }
        //Trả về bình luận 
        public function Get_bl($Id_sp,$start,$limit){
            $sql="SELECT * FROM tb_binhluan  Where Id_sp=$Id_sp ORDER BY Id desc  LIMIT $start,$limit ";
            return $this->execute($sql);
        }
        //phân trang với bl
        public function Bl_par($Id_sp){
            $sql="SELECT * FROM tb_binhluan Where Id_sp=$Id_sp";
            return $this->execute($sql);
        }
        //Insert người dùng vào bảng tb_nguoidung
        public function Insert_User_Nd($Username,$Password,$Fullname,$Number_phone,$Cv){
            $sql="INSERT INTO tb_nguoidung (Username,Password,Fullname,Number_phone,Chuc_vu) VALUES('$Username','$Password','$Fullname','$Number_phone','$Cv')";
            if($this->execute($sql)){
                $result=true;
            }
            return json_decode($result);
        }
        //Trả về User người dùng với điều kiện 
        public function Select_User_Nd($Username){
            $sql="SELECT * FROM tb_nguoidung WHERE Username='$Username'";
            return $this->execute($sql);
        }
        //Trả về thông tin người dùng trong bảng tb_nguoidung
        public function get_User_Nd(){
            $sql="SELECT * FROM tb_nguoidung";
            return $this->execute($sql);    
        }
        //Trẻ về thông tin User theo start và limit để phân trang
        public function Get_User($Start,$limit){
            $sql="SELECT * FROM tb_khachhang LIMIT $Start,$limit";
            return $this->execute($sql);
        }
        //Delete User khỏi csdl
        public function delete_User($Id_kh){
            $sql="DELETE FROM tb_khachhang WHERE Id_kh='$Id_kh'";
            return $this->execute($sql);
        }
        //Search User
        public function Search_User($Keyword){
            $sql="SELECT * FROM tb_khachhang WHERE Username LIKE '%".$Keyword."%' OR Fullname LIKE '%".$Keyword."%' OR Number_phone LIKE '%".$Keyword."%' OR Email LIKE '%".$Keyword."%' OR Address LIKE '%".$Keyword."%'";
            return $this->execute($sql);
        }
        //trả về thông tin User theo ID
        public function Get_User_ID($Id_kh){
            $sql="SELECT * FROM tb_khachhang WHERE Id_kh='$Id_kh'";
            return $this->execute($sql);
        }
         //Cập nhật User               $Username,$Fullname,$Email,$Number_phone,$Address,$Status
         public function Update_UserID($Username,$Fullname,$Email,$Number_phone,$Address,$Satus){
            $sql="UPDATE tb_khachhang  SET Username='$Username',Fullname='$Fullname', Email='$Email',Number_phone='$Number_phone',Address='$Address',Status='$Satus'";
            return $this->execute($sql);
        }
        public function get_staff(){
            $sql="SELECT * FROM tb_quen_nd";
            return $this->execute($sql);
        }
        public function deleteId_nd($Id){
            $sql="DELETE FROM tb_nguoidung WHERE Id='$Id'";
            return $this->execute($sql);
        }
        public function update_status($st,$Id){
            $sql="UPDATE tb_nguoidung SET Status='$st' WHERE Id='$Id'";
            return $this->execute($sql);
        }
        public function check($User){
            $sql="SELECT * FROM tb_nguoidung WHERE Chuc_vu='1' and Username='$User'";
            return $this->execute($sql);
        }
        public function update_user_pass($User,$Pass){
            $sql="UPDATE tb_khachhang SET Password='$Pass' WHERE Username='$User'";
            $result=false;
            if($this->execute($sql)){
                $result=true;
            }
            return json_decode($result);
        }
        public function getPassword($User){
            $sql="SELECT * FROM tb_khachhang WHERE Username='$User'";
            return $this->execute($sql);    
        }
    }
?>