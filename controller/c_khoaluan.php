<?php
include_once('../model/m_khoaluan.php');
class C_khoaluan{
    public function getList(){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->getList();
        return array('khoaluan'=>$khoaluan);
    }
    public function check($idSinhvien){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->check($idSinhvien);
        return array('isExist'=>$khoaluan);
    }
    public function add($idSinhvien,$idGiaovien,$tendetai,$bailam,$diem){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->add($idSinhvien,$idGiaovien,$tendetai,$bailam,$diem);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function delete($id){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->delete($id);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function getDetail($id){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->getDetail($id);
        return array('khoaluan'=>$khoaluan);
    }
    public function update($tendetai,$id_giaovien,$idSinhvien,$bailam,$diem,$id){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->update($tendetai,$id_giaovien,$idSinhvien,$bailam,$diem,$id);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function checkforupdate($idSinhvien,$id){
        $m_khoaluan=new M_khoaluan();
        $khoaluan=$m_khoaluan->checkforupdate($idSinhvien,$id);
        return array('isExist'=>$khoaluan);
    }
}

?>