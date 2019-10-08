<?php
include_once('database.php');
class M_sinhvien extends database{
    public function getList(){
        $sql="SELECT sinhvien.ID as sinhvien_id, sinhvien.masv as masv, sinhvien.name as tensinhvien, khoa.name as khoa, nganh.name as nganh FROM sinhvien join nganh on nganh.ID=sinhvien.nganh_id join khoa on khoa.ID=nganh.khoa_ID";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function check($masv){
        $sql="SELECT * FROM sinhvien where masv='".$masv."'";
        $this->setQuery($sql);
        return $this->loadRow(array($masv));
    }
    public function checkforupdate($id,$masv){
        $sql="SELECT * FROM sinhvien where masv='".$masv."' and id not like ".$id;
        $this->setQuery($sql);
        return $this->loadRow(array($id,$masv));
    }
    public function add($masv,$name,$nganh){
        $sql="INSERT INTO sinhvien (masv,name,nganh_id) values('".$masv."','".$name."','".$nganh."')";
        $this->setQuery($sql);
        return $this->execute(array($masv,$name,$nganh));
    }
    public function getDetail($id){
        $sql="SELECT sinhvien.*, khoa.ID as khoa FROM sinhvien inner join nganh on nganh.ID=sinhvien.nganh_id inner join khoa on khoa.ID=nganh.khoa_id where sinhvien.ID='".$id."'";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function update($id,$name,$masv,$nganh){
        $sql="UPDATE sinhvien SET name='".$name."',nganh_id='".$nganh."', masv='".$masv."' WHERE id='".$id."'";
        $this->setQuery($sql);
        return $this->execute(array($id,$name,$masv,$nganh));
    }
    public function delete($id){
        $sql="DELETE FROM sinhvien WHERE id='".$id."'";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }

}
?>
