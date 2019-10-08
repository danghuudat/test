<?php
include_once('../model/m_sinhvien.php');
class C_sinhvien{
    public function getList(){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->getList();
        return array('sinhvien'=>$sinhvien);
    }
    public function check($masv){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->check($masv);
        return array('isExist'=>$sinhvien);
    }
    public function add($name,$masv,$nganh){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->add($masv,$name,$nganh);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function getDetail($id){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->getDetail($id);
        return array('sinhvien'=>$sinhvien);
    }
    public function checkforupdate($id,$masv){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->checkforupdate($id,$masv);
        return array('isExist'=>$sinhvien);
    }
    public function update($id,$name,$masv,$nganh){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->update($id,$name,$masv,$nganh);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    public function delete($id){
        $m_sinhvien=new M_sinhvien();
        $sinhvien=$m_sinhvien->delete($id);
        $m_doan=new M_khoaluan();
        $khoaluan=$m_doan->deleteBySv($id);
        header('Location:'.$_SERVER['HTTP_REFERER']);

    }

}

?>