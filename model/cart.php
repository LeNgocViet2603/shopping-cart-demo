<?php 
    class cart{
        function add_item($key,$name,$author,$cost,$quantity) {
            if ($quantity < 1) return;
    
            // nếu sản phẩm đã tồn tại trong giỏ hàng thì cập nhật lại số lượng sản phẩm
            if (isset($_SESSION['my_cart'][$key])) {
                $quantity += $_SESSION['my_cart'][$key]['qty'];
                $this->update_item($key, $quantity);
                return;
            }
    
            // thêm sản phẩm mới vào giỏ hàng
            $total = $cost*$quantity;
            $item = array(
                'name' => $name,
                'author'=>$author,
                'cost' => $cost,
                'qty'  => $quantity,
                'total' => $total
            );
            $_SESSION['my_cart'][$key] = $item;
        }
        function update_item($key, $quantity) {
            $quantity = (int) $quantity;
            if (isset($_SESSION['my_cart'][$key])) {
                if ($quantity <= 0) {
                    unset($_SESSION['my_cart'][$key]);
                } else {
                    $_SESSION['my_cart'][$key]['qty'] = $quantity;
                    $total = $_SESSION['my_cart'][$key]['cost'] *
                             $_SESSION['my_cart'][$key]['qty'];
                    $_SESSION['my_cart'][$key]['total'] = $total;
                }
            }
        }    
        public function tongphu()
        {
            $subtotal=0;
            if(isset($_SESSION['my_cart'])){
                foreach ($_SESSION['my_cart'] as $key => $value) {
                    $subtotal+=$value['total'];
                 }
            }        
            $subtotal_format =number_format($subtotal,3,'.','.');
            return $subtotal_format;
        }
    
    }
    
?>