<?php
 class Model_donhang extends Model_db{
    function getAllBill()
    {
        $sql = "SELECT * FROM donhang ORDER BY idDH DESC";
        return $this->result1(0,$sql);
    }
    function getProDetail($idDH)
    {
        $sql = "SELECT * FROM donhangchitiet WHERE idDH = ?";
        return $this->result1(0,$sql,$idDH);
    }
    function getInfoDetail($idDH)
    {
        $sql = "SELECT * FROM donhang WHERE idDH = ?";
        return $this->result1(1,$sql,$idDH);
    }
    function getBillDetail($id)
    {
        $sql = "SELECT * FROM donhang WHERE idDH = ?";
        return $this->result1(1,$sql,$id);
    }
    function editBIllDetail($name,$email,$dienthoai,$diachi,$ghichucuakhach,$ghichucuaadmin,$thoidiemgiaohang,$thoidiemdathang,$trangthai,$anhien,$idDH)
    {
        $sql ="UPDATE donhang SET TenNguoiNhan = ?,EmailNguoiNhan=?,dienthoai=?,DiaChiNguoiNhan=?,GhiChuCuaKhach=?,GhiChuCuaAdmin=?,ThoiDiemGiaoHang=?,ThoiDiemDatHang=?,TrangThai=?,AnHien=? WHERE idDH=?";
        return $this->exec1($sql,$name,$email,$dienthoai,$diachi,$ghichucuakhach,$ghichucuaadmin,$thoidiemgiaohang,$thoidiemdathang,$trangthai,$anhien,$idDH);
    }
    function del($id){
        $sql ="DELETE FROM donhang WHERE idDH = ?";
        return $this->exec1($sql,$id);
    }
}