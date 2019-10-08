<?php
include_once('../model/m_khoa.php');
class C_khoa{
    public function getListKhoa(){
        $m_khoa=new M_khoa();
        $khoa=$m_khoa->getListKhoa();
        return array('khoa'=>$khoa);
    }
    public function checkkhoa($name){
        $m_khoa=new M_khoa();
        $isExist=$m_khoa->checkKhoa($name);
        return array("isExist"=>$isExist);
    }
    public function addKhoa($name){
        $m_khoa=new M_khoa();
        $newkhoa=$m_khoa->addKhoa($name);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function getKhoa($id){
        $m_khoa=new M_khoa();
        $khoa=$m_khoa->getKhoa($id);
        return array("khoa"=>$khoa);
    }
    public function updateKhoa($id,$name){
        $m_khoa=new M_khoa();
        $newkhoa=$m_khoa->updateKhoa($id,$name);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
}

?>