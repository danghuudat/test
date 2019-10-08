<?php
include_once('../model/m_bomon.php');
class C_bomon{
    public function getListBomon(){
        $m_bomon=new M_bomon();
        $bomon=$m_bomon->getListBomon();
        return array('bomon'=>$bomon);
    }
    public function checkBomon($name){
        $m_bomon=new M_bomon();
        $isExist=$m_bomon->checkBomon($name);
        return array("isExist"=>$isExist);
    }
    public function addBoMon($name){
        $m_bomon=new M_bomon();
        $newbomon=$m_bomon->addBoMon($name);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function getBomon($id){
        $m_bomon=new M_bomon();
        $bomon=$m_bomon->getBomon($id);
        return array("bomon"=>$bomon);
    }
    public function updateBomon($id,$name){
        $m_bomon=new M_bomon();
        $newbomon=$m_bomon->updateBomon($id,$name);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
}

?>