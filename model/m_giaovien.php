<?php
include_once('database.php');
class M_giaovien extends database{
     public function getList(){
      $sql="SELECT giaovien.ID as giaovien_id, giaovien.magv as magiaovien, giaovien.name as tengiaovien, bomon.name as bomon FROM giaovien join bomon on bomon.ID=giaovien.bomon_id";
      $this->setQuery($sql);
      return $this->loadAllRows();
     }
     public function check($magv){
         $sql="SELECT * FROM giaovien where magv='".$magv."'";
         $this->setQuery($sql);
         return $this->loadRow(array($magv));
     }

     public function checkforupdate($id,$magv){
         $sql="SELECT * FROM giaovien where magv='".$magv."' and id not like $id";
         $this->setQuery($sql);
         return $this->loadRow(array($magv));
     }


     public function add($magv,$name,$bomon){
         $sql="INSERT INTO giaovien (magv,name,bomon_id) values('".$magv."','".$name."','".$bomon."')";
         $this->setQuery($sql);
         return $this->execute(array($magv,$name,$bomon));
     }
     public function getDetail($id){
         $sql="SELECT * FROM giaovien where ID='".$id."'";
         $this->setQuery($sql);
         return $this->loadRow(array($id));
     }
     public function update($id,$name,$bomon,$magv){
         $sql="UPDATE giaovien SET name='".$name."',bomon_id='".$bomon."', magv='".$magv."' WHERE id='".$id."'";
         $this->setQuery($sql);
         return $this->execute(array($id,$name,$bomon,$magv));
     }
     public function delete($id){
         $sql="DELETE FROM giaovien WHERE id='".$id."'";
         $this->setQuery($sql);
         return $this->execute(array($id));
     }
}
 ?>
