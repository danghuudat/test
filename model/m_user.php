<?php
include_once('database.php');
class M_user extends database{
    public function dangnhap($username,$password){
        $sql=  "SELECT * FROM user where username='".$username."' and password='".$password."'";
        $this->setQuery($sql);
        return $this->loadRow(array($username,$password));
    }
}
?>