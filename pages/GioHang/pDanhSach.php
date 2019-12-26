<div id="quanlygiohang">
    <h2>Quản lý giỏ hàng của bạn</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th >Giá sản phẩm</th>
            <th >Số lượng</th>
            <th >Thao tác</th>
        </tr>
        <?php
            $tongGia = 0;
            if(isset($_SESSION["GioHang"]))
            {
                $soSanPham = count($gioHang->listProduct);

                for($i=0; $i<$soSanPham; $i++){
                    $id = $gioHang->listProduct[$i]->id;
                    $sql = "SELECT * FROM SanPham WHERE MaSanPham =$id";

                    $result = DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result)
        ?>
        <form name="frmGioHang" action="pages/GioHang/xlCapNhatGioHang.php" method="post">
            <tr>
                <td>1</td>
                <td>
                    <?= $row["TenSanPham"];?>
                </td>
                <td align="center">
                    <img src="images/<?= $row["HinhURL"]; ?>" width="100">
                </td>
                <td>
                <?=number_format($row["GiaSanPham"])  ?>
                </td>
                <td>
                    <input type="text" name="txtSL" value=" <?= $gioHang->listProduct[$i]->num; ?>"
                     width="55" size="5">
                    <input type="hidden" 
                    name="hdID" value=" <?= $gioHang->listProduct[$i]->id; ?>" />
                </td>
                <td>
                    <input type="submit" value="Cập nhật số lượng" name="capnhat">
                </td>
            </tr>
        </form>
        <?php
        $tongGia += $row["GiaSanPham"]* $gioHang->listProduct[$i]->num;
        }           
    }
    $_SESSION["TongGia"] = $tongGia;
?>
</thead>
</table >
<br><br>
    <div class="pprice">
        Tổng thành tiền: <?=number_format($tongGia)  ?> đ
    </div>
    <br><br>
    <a href="pages/GioHang/xlDatHang.php">
        <img src="img/dathang.gif" width="150" >
    </a>
</div>