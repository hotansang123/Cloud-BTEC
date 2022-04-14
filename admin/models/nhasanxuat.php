<?php
class Model_nhaSanXuat extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM nhasanxuat";
        return $this->result1(0,$sql);
    }
    function addNewProducer($name,$order,$showHide,$slug)
    {
        $sql = "INSERT INTO nhasanxuat(TenNSX,ThuTu,AnHien,slug) VALUE(?,?,?,?)";
        return $this->SqlExecDebug($sql,$name,$order,$showHide,$slug);
    }
    function deleteProducer($id)
    {   
        $sql = "DELETE FROM nhasanxuat WHERE idNSX = ?";
        return $this->exec1($sql,$id);
    }
    function editProducer($name,$order,$showHide,$slug,$id){
        $sql = "UPDATE nhasanxuat SET TenNSX= ?,ThuTu=?,AnHien=?,slug=? WHERE idNSX=?";
        return $this->exec1($sql,$name,$order,$showHide,$slug,$id);
    }
    function showOneProducer($id)
    {
        $sql = "SELECT * FROM nhasanxuat WHERE idNSX=?";
        return $this->result1(1,$sql,$id);
    }
}

?>