<?php
/**
 * 
 */
include_once('database.php');

class M_doan extends database
{
	
	function getmenu()
	{
		$sql="SELECT khoa.*, GROUP_CONCAT(nganh.id,':',nganh.name) as nganh FROM khoa INNER JOIN nganh ON khoa.id=nganh.khoa_id GROUP BY khoa.id";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getTable(){
	    $sql="SELECT luanvan.tendetai, luanvan.bailam, giaovien.name as tengiaovien, sinhvien.name as tensinhvien, nganh.name as nganh from  luanvan INNER JOIN giaovien on giaovien.ID=luanvan.ID_giaovien INNER JOIN sinhvien ON sinhvien.ID=luanvan.ID_sinhvien join nganh on nganh.ID=sinhvien.nganh_id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getTablebyID($id){
        $sql="SELECT luanvan.tendetai, luanvan.bailam, giaovien.name as tengiaovien, sinhvien.name as tensinhvien, nganh.name as nganh from  luanvan INNER JOIN giaovien on giaovien.ID=luanvan.ID_giaovien INNER JOIN sinhvien ON sinhvien.ID=luanvan.ID_sinhvien join nganh on nganh.ID=sinhvien.nganh_id where nganh.ID='".$id."'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getName($id){
	    $sql="SELECT * FROM nganh WHERE ID='".$id."'";
        $this->setQuery($sql);
        return $this->loadRow(array($id));

    }
}
 ?>