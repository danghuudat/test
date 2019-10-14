<?php
include_once('../model/m_nganh.php');
class C_nganh{
    public function getList(){
        $m_nganh=new M_nganh();
        $nganh=$m_nganh->getList();
        return array('nganh'=>$nganh);
    }
    public function check($name){
        $m_nganh=new M_nganh();
        $nganh=$m_nganh->check($name);
        return array('isExist'=>$nganh);
    }
    public function checkExist($name,$id){
        $m_nganh=new M_nganh();
        $nganh=$m_nganh->check($name,$id);
        return array('isExist'=>$nganh);
    }

    public function add($name,$khoa){
        $m_nganh=new M_nganh();
        $nganh=$m_nganh->add($name,$khoa);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function getDetail($id){
        $m_nganh=new M_nganh();
        $nganh=$m_nganh->getDetail($id);
        return array('nganh'=>$nganh);
    }
    public function update($id,$name,$khoa){
        $m_nganh=new M_nganh();
        $nganh=$m_nganh->update($id,$name,$khoa);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
}

?>