<?php
include_once('database.php');
class M_nganh extends database{
    public function getList(){
        $sql="SELECT nganh.ID as nganh_id, nganh.name as tennganh, khoa.name as khoa, nganh.khoa_id as idkhoa FROM nganh join khoa on khoa.ID=nganh.khoa_id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function check($name){
        $sql="SELECT * FROM nganh where name='".$name."'";
        $this->setQuery($sql);
        return $this->loadRow(array($name));
    }
    public function add($name,$khoa){
        $sql="INSERT INTO nganh (name,khoa_id) values('".$name."','".$khoa."')";
        $this->setQuery($sql);
        return $this->execute(array($name,$khoa));
    }
    public function getDetail($id){
        $sql="SELECT nganh.ID as nganh_id, nganh.name as tennganh, khoa.name, nganh.khoa_id as khoa FROM nganh inner join khoa on nganh.khoa_id=khoa.ID where nganh.ID='".$id."'";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function update($id,$name,$khoa){
        $sql="UPDATE nganh SET name='".$name."',khoa_id='".$khoa."' WHERE ID='".$id."'";
        $this->setQuery($sql);
        return $this->execute(array($id,$name,$khoa));

    }
}

?>