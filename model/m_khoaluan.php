<?php
include_once ("database.php");
class M_khoaluan extends database {
    public function getList(){
        $sql="SELECT luanvan.*, giaovien.name as giaovien, sinhvien.name as sinhvien, nganh.name as nganh, sinhvien.masv as masv, giaovien.magv as magv from luanvan inner join sinhvien on sinhvien.ID=luanvan.ID_sinhvien inner join giaovien on giaovien.ID=luanvan.ID_giaovien inner join nganh on nganh.ID=sinhvien.nganh_id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function check($idSinhvien){
        $sql="SELECT * FROM luanvan where ID_sinhvien='".$idSinhvien."'";
        $this->setQuery($sql);
        return $this->loadRow(array($idSinhvien));
    }
    public function add($idSinhvien,$idGiaovien,$tendetai,$bailam,$diem){
        $sql="INSERT INTO luanvan (ID_sinhvien,ID_giaovien,tendetai,bailam,diem) values('".$idSinhvien."','".$idGiaovien."','".$tendetai."','".$bailam."','".$diem."')";
        $this->setQuery($sql);
        return $this->execute(array($idSinhvien,$idGiaovien,$tendetai,$bailam,$diem));
    }
    public function deleteBySv($idSinhvien){
        $sql="DELETE FROM luanvan WHERE ID_sinhvien='".$idSinhvien."'";
        $this->setQuery($sql);
        return $this->execute(array($idSinhvien));
    }
    public function deleteByGV($idGiaoVien){
        $sql="DELETE FROM luanvan WHERE ID_giaovien='".$idGiaoVien."'";
        $this->setQuery($sql);
        return $this->execute(array($idGiaoVien));
    }
    public function delete($id){
        $sql="DELETE FROM luanvan WHERE ID='".$id."'";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
    public function getDetail($id){
        $sql="SELECT luanvan.*, giaovien.name as giaovien, sinhvien.name as sinhvien, nganh.name as nganh, sinhvien.masv as masv, giaovien.magv as magv from luanvan inner join sinhvien on sinhvien.ID=luanvan.ID_sinhvien inner join giaovien on giaovien.ID=luanvan.ID_giaovien inner join nganh on nganh.ID=sinhvien.nganh_id WHERE luanvan.ID='".$id."'";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function checkforupdate($idSinhvien,$id){
        $sql="SELECT * FROM luanvan where ID_sinhvien='".$idSinhvien."' and ID NOT LIKE '".$id."'";
        $this->setQuery($sql);
        return $this->loadRow(array($idSinhvien,$id));
    }
    public function update($tendetai,$id_giaovien,$idSinhvien,$bailam,$diem,$id){
        $sql="UPDATE luanvan SET tendetai='".$tendetai."',ID_giaovien='".$id_giaovien."', ID_sinhvien='".$idSinhvien."',bailam='".$bailam."', diem='".$diem."' WHERE ID='".$id."'";
        $this->setQuery($sql);
        return $this->execute(array($tendetai,$id_giaovien,$idSinhvien,$bailam,$diem,$id));
    }

}

?>