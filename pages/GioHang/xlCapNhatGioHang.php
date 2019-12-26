<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    if(isset($_POST["txtSL"]))
    {   
        $sl=$_POST["txtSL"];
        if(is_nan($sl)==false)
        {
            // nếu số lượng là số thì phải xử lý
            $id = $_POST["hdID"];
            $gioHang = unserialize($_SESSION["GioHang"]);
            

            if( $sl > 0 )
            {
                // xử lý cập nhật số lượng mới
                $gioHang->update($id, $sl);

                $_SESSION["GioHang"] = serialize($gioHang);
            }
            else
            {
                if($sl==0)
                {
                    $gioHang->delete($id);
                    $_SESSION["GioHang"]=serialize($gioHang);
                }
            }
            DataProvider::ChangeURL("../../index.php?a=5");
        }
        else
        {
            // nếu số lượng mới k là số thì sẽ chuyển về trang giỏ  hàng
            DataProvider::ChangeURL("../../index.php?a=5");
        }
    }
    else
    {
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>