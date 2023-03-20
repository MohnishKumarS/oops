<?php
 require 'assets/php/config.php';

 class change extends DB{
     function getuserID($conn,$id){
        $sql = "SELECT * from employee_details where emp_id = '$id'";
        $res  = $conn->query($sql);
        $arr = [];
        if($res->num_rows > 0){
            $arr= $res->fetch_assoc();
            
        }
        return $arr;
     }

    //  ------------update-----------------

    function update($conn,$id){
        extract($_REQUEST);
        $sql = "UPDATE employee_details set emp_id = '$emp_id' ,username = '$username', gender='$gender', mobile='$mobile' where id = $id";
        $res = $conn->query($sql);
        if($res){
            header("location:list.php");
        }else{
            echo ("Error description: " . $conn -> error);
        }
    }

    // -------------delete-----------------

        function delete($conn,$id){
            $sql = "DELETE FROM employee_details where emp_id = $id";
            $res = $conn->query($sql);

            if($res){
                header("location:list.php");
            }else{
                echo ("Error description: " . $conn -> error);
            }
        }
 }

 $last = new change();
 $link = $last->connection();
 
 if(isset($_POST['emp_update'])){
    //  print_r($_POST);
    $last->update($link,$_POST['user_id']);
 }

 if(isset($_GET['submitdelete'])){
    //  echo 'yesss deleye';
    $last->delete($link,$_GET['id']);
 }

?>