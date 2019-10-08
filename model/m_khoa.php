<?php
include_once('database.php');
class M_khoa extends database{
    public function getListKhoa(){
        $sql="SELECT *FROM khoa";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function checkKhoa($name){
        $sql="SELECT * FROM khoa where name='".$name."'";
        $this->setQuery($sql);
        return $this->loadRow(array($name));
    }
    public function addKhoa($name){
        $sql="INSERT INTO khoa (name) values ('".$name."')";
        $this->setQuery($sql);
        return $this->execute(array($name));
    }
    public function getKhoa($id){
        $sql="SELECT * from khoa where id=?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function updateKhoa($id,$name){
        $sql="UPDATE khoa SET name=? WHERE id=?";
        $this->setQuery($sql);
        return $this->execute(array($name,$id));
    }
}
?>
