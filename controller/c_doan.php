<?php
include_once('../model/m_doan.php');
class C_doan{
	public function index(){
		$doan=new M_doan();
		$menu=$doan->getmenu();
		$data_Table=$doan->getTable();
		return array('menu'=>$menu,'data_table'=>$data_Table);
	}
	public function indexbyID($id){
        $doan=new M_doan();
        $menu=$doan->getmenu();
        $data_Table=$doan->getTablebyID($id);
        $name=$doan->getName($id);
        return array('menu'=>$menu,'data_table'=>$data_Table,'name'=>$name);
    }
}
?>