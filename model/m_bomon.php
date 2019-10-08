<?php
include_once('database.php');
class M_bomon extends database{
    public function getListBomon(){
        $sql="select * from bomon";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function checkBomon($name){
        $sql="SELECT * FROM bomon where name='".$name."'";
        $this->setQuery($sql);
        return $this->loadRow(array($name));
    }
    public function addBoMon($name){
        $sql="INSERT INTO bomon (name) values ('".$name."')";
        $this->setQuery($sql);
        return $this->execute(array($name));
    }
    public function getBomon($id){
        $sql="SELECT * from bomon where id=".$id;
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function updateBomon($id,$name){
        $sql="UPDATE bomon SET name='".$name."' WHERE id='".$id."'";
        $this->setQuery($sql);
        return $this->execute(array($id,$name));
    }
}
?>