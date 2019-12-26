<?php
   include "../../../lib/DataProvider.php";

   if(isset($_GET["id"]))
   {
       $id = $_GET["id"];
       $ten = $_GET["txtTen"];
       $hinh=$_GET['fHinh'];
       $gia=$_GET['txtGia'];
       $hang=$_GET['cmbHang'];
       $loai=$_GET['cmbLoai'];
       $slton=$_GET['txtTon'];
       $slban=$_GET['txtBan'];
       $mota=$_GET['txtMoTa'];


       $sql = "UPDATE SanPham SET TenSanPham = '$ten',HinhURL='$hinh',
       NhaSanXuat='$hang',SoLuongBan='$slban',SoLuongTon='$slton',MoTa='$mota' WHERE MaSanPham = $id";

       DataProvider::ExecuteQuery($sql);
   }

   DataProvider::ChangeURL("../../index.php?c=2");
?>