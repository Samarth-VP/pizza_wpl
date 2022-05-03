<?php

     $conn = new mysqli('localhost', 'root', '', 'samarth');
     mysqli_select_db( $conn, 'samarth');

            if(isset($_POST['input'])){

                $input = $_POST['input'];
        
                $query = "INSERT into cart(pizza) VALUES ('$input')";
        
                mysqli_query($conn, $query);
            }

            $sql = "UPDATE cart SET price = (SELECT pizza_price from pizza where pizza_name = '$input') where pizza = '$input'";
            $result = mysqli_query($conn, $sql);
?>