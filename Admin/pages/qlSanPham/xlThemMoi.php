<?php
   include "../../../lib/DataProvider.php";

   if(isset($_GET["txtTen"]))
   {
       $ten = $_GET["txtTen"];
       $id = $_GET["id"];
       $hinh=$_GET['fHinh'];
       $gia=$_GET['txtGia'];
       $hang=$_GET['cmbHang'];
       $loai=$_GET['cmbLoai'];
       $slton=$_GET['txtTon'];
       $slban=$_GET['txtBan'];
       $mota=$_GET['txtMoTa'];

       $sql = "INSERT INTO SanPham(TenSanPham,HinhURL,GiaSanPham,SoLuongTon,SoLuongBan,NhaSanXuat,MoTa, BiXoa)
        VALUES('$ten','$hinh','$gia','$slton','$slban','$hang','$mota',0)";
       DataProvider::ExecuteQuery($sql);
   }

   DataProvider::ChangeURL("../../index.php?c=2");
?>