<?php
include_once('../model/m_giaovien.php');
include_once('../model/m_khoaluan.php');

class C_giaovien{
    public function getList(){
        $m_giaovien=new M_giaovien();
        $giaovien=$m_giaovien->getList();
        return array('giaovien'=>$giaovien);
    }
    public function check($magv){
        $m_giaovien=new M_giaovien();
        $giaovien=$m_giaovien->check($magv);
        return array('isExist'=>$giaovien);
    }
    public function checkforupdate($magv,$id){
        $m_giaovien=new M_giaovien();
        $giaovien=$m_giaovien->checkforupdate($id,$magv);
        return array('isExist'=>$giaovien);
    }
    public function add($magv,$name,$bomon){
        $m_giaovien=new M_giaovien();
        $m_giaovien->add($magv,$name,$bomon);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function getDetail($id){
        $m_giaovien=new M_giaovien();
        $giaovien=$m_giaovien->getDetail($id);
        return array('giaovien'=>$giaovien);
    }
    public function update($id,$name,$bomon,$magv){
        $m_giaovien=new M_giaovien();
        $giaovien=$m_giaovien->update($id,$name,$bomon,$magv);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function delete($id){
        $m_giaovien=new M_giaovien();
        $giaovien=$m_giaovien->delete($id);
        $m_doan=new M_khoaluan();
        $khoaluan=$m_doan->deleteByGV($id);
        header('Location:'.$_SERVER['HTTP_REFERER']);

    }
}

?>