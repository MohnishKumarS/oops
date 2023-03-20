<?php 
class DB {
    function connection() {
        $conn=mysqli_connect('localhost', 'root', '', 'testing');

        if(!$conn) {
            echo 'connected successfullys';
        }

        return $conn;
    }
}



?>