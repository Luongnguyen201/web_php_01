<?php
    class cotegory extends Db{
        //thêm danh mục
        function add_cotegory($Ten_dm,$Anh_dm){
            $sql="INSERT INTO tb_dm_sp(Ten_dm,Anh_dm)VALUES('$Ten_dm','$Anh_dm')";
            $result=FALSE;
            if($this->execute($sql)){
                $result=true;
            }
            return json_decode($result);
        }
        //lấy danh sách danh mục
        public function List_cotegory(){
            $sql="SELECT * FROM tb_dm_sp";
            return $this->execute($sql);
        }
        public function Get_Id_dm($Id_dm){
            $sql="SELECT * FROM tb_dm_sp WHERE Id_dm='$Id_dm'";
            return $this->execute($sql);
        }
        public function deleteId_dm($Id_dm){
            $sql="DELETE FROM tb_dm_sp WHERE Id_dm='$Id_dm'";
            return $this->execute($sql);
        }
        public function Update_dm($Id_dm,$Ten_dm,$Anh_dm){
            $sql="UPDATE tb_dm_sp SET Ten_dm='$Ten_dm', Anh_dm='$Anh_dm' WHERE Id_dm='$Id_dm'";
            return $this->execute($sql);
        }
    }
?>