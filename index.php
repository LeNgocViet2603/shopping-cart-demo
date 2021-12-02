<?php
    session_start();
    if (empty($_SESSION['my_cart'])) {
         $_SESSION['my_cart'] = array(); 
    }
    require_once('connectDB.php');
    require_once('./model/product_model.php');
    require_once('./model/cart.php');
    $data_product = new product();
    $products_list=$data_product->getProduct($conn);
    $productName=filter_input(INPUT_GET,'productName');
    $price =filter_input(INPUT_GET,'productPrice',FILTER_VALIDATE_INT);
    $act = filter_input(INPUT_POST, 'act');
    $data= new cart();
    if ($act === NULL) {
        $act = filter_input(INPUT_GET, 'act');
        if ($act === NULL) {
            $act = 'show_list_product';
        }
    }
    switch ($act) {
        case 'show_cart':
            include('./view/cart_view.php');
            break;
        case 'show_list_product':
            include('./view/product_list.php');
            break;
        case 'add_cart':
            $key= filter_input(INPUT_GET, 'productKey',FILTER_VALIDATE_INT);
            $name = filter_input(INPUT_GET, 'productName');
            $cost  = filter_input(INPUT_GET, 'productPrice');
            $author =filter_input(INPUT_GET, 'author');
            $quantyfi=1;            
           // $data=new cart();
            $data->add_item($key,$name,$author,$cost,$quantyfi);
            include('./view/cart_view.php');
            break;
        case 'update':
            $sl_moi= filter_input(INPUT_GET, 'soluong',FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if(isset($_SESSION['my_cart'])){
                foreach($sl_moi as $key => $soLuong) {
                    if ($_SESSION['my_cart'][$key]['qty'] != $soLuong) {
                        $data->update_item($key, $soLuong);
                    }
                }
            }
            
            include('./view/cart_view.php');
            break;
        case 'del_cart':
            unset($_SESSION['my_cart']);
            include('./view/cart_view.php');
            break;
        case 'del_item_cart':
            $key =filter_input(INPUT_GET, 'productId',FILTER_VALIDATE_INT);
            $data->update_item($key,0);
            include('./view/cart_view.php');
            break;
        case 'display_cart':
            include('./view/cart_view.php');
            break;
    }
?>