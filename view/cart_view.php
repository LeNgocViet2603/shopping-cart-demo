<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<style>
    a{
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }
    h3{
        text-align: center;
    }
    .wrapper{
        width: 550px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }
    .back{
        border: 1px solid #333;
        width: 100%;
        display: flex;
        text-align: center;
        padding: 10px;
        justify-content: space-around;
        margin-bottom: 10px;
    }
    .item{
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            width: 100%;
            border: 1px solid #333;
            padding: 10px;
        }
        .submit{
            margin-bottom: 10px;
            padding: 10px;
        }
    .total{
        border: 1px solid #333;
    }
    .subtotal{
        margin-bottom: 10px;
        width: 100%;
        border: 1px solid #333;
        padding: 10px;
    }
    .quantify{
       margin-left: 250px;
    }
</style>
<body>
<div class="wrapper">
        <h3>GIỎ HÀNG CỦA BẠN</h3>
        <?php if(empty($_SESSION['my_cart'])|| count($_SESSION['my_cart'])==0):?>
            <p style="color: red; font-weight:bolder;">Giỏ hàng đang rỗng!Không có sản phẩm nào trong giỏ hàng!</p>
        <?php else: ?>
        <form action="." method="GET">
            <input type="hidden" name="act" value="update">
        <?php if(isset($_SESSION['my_cart']))foreach($_SESSION['my_cart'] as $key => $product){?>
            <div class="item">
                    <h5><?php echo $product['name']; ?></h5>
                    <p>Tác Giả:<?php echo $product['author']; ?> - Giá:<?php echo number_format($product['cost'],3, '.', '.').' VNĐ'; ?></p>
                    <div class="quantify">
                        <input type="text" name="soluong[<?php echo $key; ?>]" value="<?php echo $product['qty']; ?>">
                        <a href="?act=del_item_cart&productId=<?php echo $key;?>">--Xóa Sách này</a>
                        <p>Giá tiền cho món hàng này là:<?php echo number_format($product['total'],3,'.','.').'VNĐ'; ?></p>
                    </div>                    
            </div>
        <?php } ?>
        <div class="subtotal">
            <p>Tổng tiền cho các món hàng là: <span style="color:red;"><?php echo $data->tongphu().' VNĐ';  ?></span></p>
        </div>
        <div class="submit">
            <input type="submit" value="Cập nhật giỏ hàng">   
        </div>
    </form>
    <?php endif; ?>
    <div class="back">
        <a href="?act=show_list_product" style="color: #FF8C00; font-weight:bold;">Mua tiếp</a>
        <a href="?act=del_cart" style="color: #B22222;font-weight:bold;">Xóa bỏ giỏ hàng</a>
    </div>
    </div> 
</body>
</html>