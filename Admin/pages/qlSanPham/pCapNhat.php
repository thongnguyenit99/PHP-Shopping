<?php
    if(!isset($_GET["id"]))
       DataProvider::ChangeURL("index.php?c=404");

    $id = $_GET["id"];
    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuongXem, s.MoTa, s.BiXoa, l.TenLoaiSanPham,
     s.MaHangSanXuat, h.TenHangSanXuat, s.MaLoaiSanPham  FROM SanPham s, LoaiSanPham l, HangSanXuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<form action="pages/qlSanPham/xlCapNhat.php" method="post" onsubmit="return KiemTra();" enctype="multipart/form-data">
   <fieldset class="ThemSanPham">
      <legend style="text-align: center;">Cập nhật thông tin sản phẩm</legend>
     <div class="roww ">
          <div id="error"></div>
         <span>Tên sản phẩm:</span>
         <input type="text" name="txtTen" class="form-control" style="width:300px" id="txtTen" value="<?php echo $row["TenSanPham"]; ?>" />
         <o id="errTen"></i>
        <span>Hãng sản xuất</span>
        <select name="cmbHang" class="form-control" style="width:300px">
            <?php
                $sql = "SELECT *FROM HangSanXuat WHERE BiXoa = 0";
                $result = DataProvider::ExecuteQuery($sql);
                while($row1 = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row1["MaHangSanXuat"]; ?>"<?php if($row["MaHangSanXuat"] == $row1["MaHangSanXuat"]) echo "selected";
                    ?>><?php echo $row1["TenHangSanXuat"]; ?></option>
                          <?php
                }
                ?>
                </select>
        
        <div>
           <span>Loại sản phẩm</span>
           <select name="cmbLoai" class="form-control" style="width:300px">
               <?php
                  $sql = "SELECT *FROM LoaiSanPham WHERE BiXoa = 0";
                  $result = DataProvider::ExecuteQuery($sql);
                  while($row1 = mysqli_fetch_array($result)){
                      ?>
                      <option  style="width:300px" value="<?php echo $row1["MaLoaiSanPham"]; ?>"<?php if($row["MaLoaiSanPham"] == $row1["MaLoaiSanPham"]) echo "selected";
                      ?>><?php echo $row1["TenLoaiSanPham"]; ?></option>
                            <?php
                  }
                  ?>
                  </select>
                  <div>
                    <span>Hình</span>
                    <input class="form-control" style="width:300px" type="file" name="fHinh"/><br/>
                    <img src="../images/<?php echo $row["HinhURL"]; ?>" width="75"/>
                 </div>
                  <div>
                      <span>Giá</span>
                      <input type="text" class="form-control" style="width:300px" name="txtGia" id="txtGia" value="<?php echo $row["GiaSanPham"]; ?>"/>
                     
                 </div>
               <div>
                    <span>Số lượng tồn</span>
                   <input type="text" class="form-control" style="width:300px" name="txtTon" id="txtTon"  value="<?php echo $row["SoLuongTon"]; ?>"/>
               
               </div>
               <div>
                    <span>Số lượng bán</span>
                   <input type="text"class="form-control" style="width:300px" name="txtBan" id="txtBan"  value="<?php echo $row["SoLuongBan"]; ?>"/>
               <div>
                     <span>Mô tả</span>
                     <textarea class="form-control" style="width:300px;height:200px" name="txtMoTa"><?php echo $row["MoTa"]; ?></textarea>
               </div>
                <div>
                  <input type="hidden" class="form-control" style="width:300px" name="id" value="<?php echo $row["MaSanPham"]; ?>"/>
                   <button type="submit" value="Cập nhật "  class="btn btn-primary ">Cập nhật</button>
                </div>
    </fieldset>
</form>
<script type="text/javascript">
   function KiemTra()
   {
       var ten = document.getElementById("txtTen");
       var gia = document.getElementById("txtGia");
       var slton = document.getElementById("txtTon");
       var slban = document.getElementById("txtBan");
       var err = document.getElementById("error");
       if(ten.value == "")
       {
           err.innerHTML = "Tên sản phẩm không được rỗng";
           ten.focus();
           return false;
       }

       if(gia.value == "")
       {
           err.innerHTML = "Giá sản phẩm không được rỗng";
           gia.focus();
           return false;
       }

       if(slton.value == "")
       {
           err.innerHTML = "Số lượng tồn không được rỗng";
           slton.focus();
           return false;
       }
        if(slban.value == "")
       {
           err.innerHTML = "Số lượng bán không được rỗng";
           slban.focus();
           return false;
       }
       else
           err.innerHTML = "";
           
        return true;
   }
</script>

    