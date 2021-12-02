<?php 
    class product{
        function getProduct($db)
        {
            $query = 'SELECT * FROM books';
            $result = $db->query($query);
            return $result;
        }
    }

?>