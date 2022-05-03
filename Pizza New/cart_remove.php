<?php

    $conn = new mysqli('localhost', 'root', '', 'samarth');
			mysqli_select_db( $conn, 'samarth');

            // if(isset($_POST['input'])){

            //     $input = $_POST['input'];
        
            //     $query = "DELETE FROM cart where pizza = '$input'";
        
            //     mysqli_query($conn, $query);
            // }
            if(isset($_POST['input'])){

                $input = $_POST['input'];
        
                $query = "DELETE FROM cart where order_id = (SELECT Min(order_id) FROM cart where pizza = '$input')";
        
                mysqli_query($conn, $query);
            }
?>

