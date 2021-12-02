<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>        
        .wrapper{
            width: 960px;
            margin: 0 auto;
        }
        h3{
            text-align: center;
            color: #FF0000;
        }
        .cart{
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
            margin-bottom: 10px;
        }
        .item{
            display: flex;
            flex-direction: column;
            width: 100%;
            border: 1px solid #333;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h3>1911505310168 LÊ NGỌC VIỆT DEMO SHOPPING CART</h3>
        <div class="cart">
            <?php if(isset($_SESSION['my_cart'])&& count($_SESSION['my_cart'])>0):?>
                <p style="font-weight: bolder;">Giỏ hàng của bạn đang có <?php echo count($_SESSION['my_cart']);?> sản phẩm</p>
                <a href="?act=display_cart">Xem giỏ hàng</a>
            <?php else:?>
                <p style="font-weight: bolder;">Chưa thêm sản phẩm nào vào giỏ hàng!</p>
            <?php endif;?>
        </div>
        <?php foreach($products_list as $key => $product){?>
        <div class="item">
                <h5><?php echo $product['title']; ?></h5>
                <p>Tác Giả:<?php echo $product['author']; ?> - Giá:<?php echo number_format($product['price'],3, '.', '.').' VNĐ'; ?></p>
                <a href="?act=add_cart&productName=<?php echo $product['title']; ?>&productPrice=<?php echo $product['price']; ?>&productKey=<?php echo $key; ?>&author=<?php echo $product['author'];  ?>">
                Mua sách này</a>          
        </div>
        <?php } ?>
    </div>    
</body>
</html>