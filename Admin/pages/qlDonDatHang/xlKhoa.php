<?php 
include "../../../lib/DataProvider.php";

   if(isset($_GET["id"]))
   {
       $id = $_GET["id"];
        //kiểm tra có đơn đạt hàng nào đang muốn xóa hay không?
       $sql = "SELECT COUNT(*) FROM DonDatHang WHERE MaDonDatHang = $id";
       $result = DataProvider::ExecuteQuery($sql);
       $row = mysqli_fetch_array($result);
       if($row[0] == 0)
       {
           //thực hiện xóa đon dat hang ra khỏi db
           $sql = "DELETE FROM DonDatHang WHERE MaDonDatHang = $id AND MaTinhTrang=4";
       }
       else
       {
           //thực hiện khóa đon dat hang do đã có sản phẩm thuộc về loại này
           $sql = "UPDATE DonDatHang SET BiXoa = 1 - BiXoa WHERE MaDonDatHang = $id";
       }
       
       DataProvider::ExecuteQuery($sql);
   }

   DataProvider::ChangeURL("../../index.php?c=5");
?>